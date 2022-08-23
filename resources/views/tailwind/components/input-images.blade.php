<div x-data="images()">
    <p x-text="message" />
    <div class="drag-container" @dragover="dragover($event)" >
        <template x-for="(item, index) in items" :key="item.id">
                <img :id="item.id" :src='item.img' class="draggable" @dragover="dragover($event)" @dragstart="dragstart($event)" @dragend="dragend($event)" draggable="true" />
        </template>
    </div>
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
                {id: 0, img:'https://fakeimg.pl/100/?text=1/'},
                {id: 1, img:'https://fakeimg.pl/100/?text=2/'},
                {id: 2, img:'https://fakeimg.pl/100/?text=3/'},
                {id: 3, img:'https://fakeimg.pl/100/?text=4/'},
            ],
            draggedElement: 0,
            dragstart(e) {
                e.target.classList.add('dragging');
                this.draggedElement = e.target.id;
            },
            dragend(e) {
                e.target.classList.remove('dragging');
            },
            dragover(e) {
                e.preventDefault();
                var draggedOverEleIndex = e.target.id;
                this.swapeInJson(this.draggedElement, draggedOverEleIndex);
                ;
            },
            swapeInJson(selectedIndex, targetedEl) {
                console.log(selectedIndex)
                console.log(targetedEl)
                var dataSelectedEle = this.items[selectedIndex]
                this.items.splice(selectedIndex,1);
                this.items.splice(targetedEl + 1, 0, dataSelectedEle);

                //var i = this.items.length;
                /*
                while (i--) {
                    if(selectedEle.indexOf(this.items[i].id)!=-1){
                        var data = this.items[selectedEle.indexOf(this.items[i].id)];
                        console.log(data);
                        //this.items.splice(targetedEl, 0, data)
                    }
                }
                */
                console.log(this.items);

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
