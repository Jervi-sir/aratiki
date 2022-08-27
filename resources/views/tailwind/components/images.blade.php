<div x-data="images" class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" >
        Images
    </label>
    <div class="images-list">
        <template x-for="(image, index) in images">
            <div class="image-container">
                <img class="" :src='image' @click="previewImages(this.src)" alt="">
            </div>
        </template>
        <label for="images-input" class="add-btn">
            <span class=" cursor-pointer bg-slate-800 hover:bg-slate-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">add image</span>
        </label>
        <input @change='addImage($event.target)'
            type="file"
            name="images[]"
            id="images-input"
            accept="image/*"
            multiple
            hidden
        >
    </div>
</div>
<style>
.images-list {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.image-container {
    width: 28.5vmin;
    height: 28.5vmin;
    overflow: hidden;
    border-radius: 0.7rem;
    display: flex;
}

.add-btn {
    display: flex;
    height: 28.5vmin;
}

.add-btn span {
    transform: scale(-1, -1);
    writing-mode: vertical-rl;
    text-align: center;
}

.image-container img {
    width: 100%;
    object-fit:cover;
}

</style>

<script>
    function images() {
        return {
            message: 'twinki',
            images: [],
            addImage(event) {
                let max = 4;
                if(this.images.length >= max) {
                    console.log('only max are allowed');
                    return;
                }
                this.previewImages(event, max);
            },
            previewImages(event, max) {
                for (let i = 0; i < event.files.length; i++) {
                    this.images.push(URL.createObjectURL(event.files[i]));
                }
            },
        }
    }
</script>
