<div x-data="images()">
    <p x-text="message" />
    <ul class="drag-container" id="items" @dragover="dragover($event)" >
        <template x-for="item in items" :key="item.id">
            <li x-text="item.text" class="draggable" @dragover="dragover($event)" @dragstart="dragstart($event)" @dragend="dragend($event)" draggable="true">
                <span x-text="item.id"></span>
            </li>
        </template>
    </ul>
</div>
<style>
    .drag-container {
        display:flex;
        gap: 5rem;
    }
    .draggable.dragging {
        opacity: 0.5;
    }
</style>
<script>
    const container = document.querySelector('.drag-container');
    function images() {
        return {
            message: 'twinki',
            items: [
                {id: 0, text:'text0'},
                {id: 1, text:'text1'},
                {id: 2, text:'text2'},
                {id: 3, text:'text3'},
            ],
            dragstart(e) {
                e.target.classList.add('dragging');
                console.log(e.target.firstChild.innerHTML)
            },
            dragend(e) {
                e.target.classList.remove('dragging');
            },
            dragover(e) {
                e.preventDefault();
                //console.log(e.target)
                //const afterElement = getDragAfterElement(e.clientY);
                //const draggable = document.querySelector('.dragging');
                //container.insertBefore(draggable, afterElement);
                //container.appendChild(draggable);
            }
        }
    }

    function getDragAfterElement(y) {
        const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];
        return draggableElements.reduce((closest, child) => {
            const box = child;
        console.log(box);
            const offset = y - box.top - box.height / 2;
            return { offset: offset, element: child };
        }, { offset: Number.NEGATIVE_INFINITY}).element;
    }
</script>
