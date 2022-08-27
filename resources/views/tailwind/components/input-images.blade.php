<div x-data="images">
    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Images
    </label>
    <div class="image">
        <template x-for="(image, index) in images">
            <div class="show">
                <img :src='image' @click="previewImages(this.src)" alt="">
                <button class="remove" @click="removeImage(index)" type="button">del</button>
            </div>
        </template>
        <label class="add-img" for="add-image"><span>+</span></label>
        <input hidden type="file" id="add-image"  accept="image/png, image/jpeg"  multiple @change='addImage($event.target)'>
    </div>
    <div class="output">
        <template x-for="comp in compresseds">
            <input name="imageCompressed[]" type="text" :value='comp' hidden>
        </template>
    </div>
</div>
<style>
    .images-list {
        display:flex;
        gap: 5rem;
    }
    .draggable.dragging {
        opacity: 0.5;
    }
</style>
<script>
    function images() {
        return {
            message: 'twinki',
            images: [],
            compresseds: [],

            setAsMainImg(e) {
                var EleId = e.target.id;
                var dataTemp = this.items[EleId];
                this.items[EleId] = this.items[0];
                this.items[0] = dataTemp;
                console.log(this.items)
            },
            addImage(event) {
                let max = 4;
                if(this.images.length >= max) {
                    console.log('only max are allowed');
                    return;
                }
                //preview images
                this.previewImages(event, max);
                //compress images
                this.compressAllImages();
            },
            previewImages(event, max) {
                for (let i = 0; i < event.files.length; i++) {
                    this.images.push(URL.createObjectURL(event.files[i]));
                }
            },
            removeImage(index) {
                this.images.splice(index, 1);
                this.compressAllImages();
            },
            compressAllImages(max = 4) {
                this.compresseds = [];
                const countImage = this.images.length;
                for(var i = 0; i < countImage; i++) {
                    if(i > max) {
                        return;
                    }
                    var result = this.compressOneImage(this.images[i]);
                    this.compresseds.push(result);
                }
                console.log(this.compresseds)
            },
            compressOneImage(blobURL) {
                //input is blobURL
                var imgEle = new Image();
                imgEle.src = blobURL;
                /*--- Create Canva ---*/
                var canvas = document.createElement('canvas');
                const ctx = canvas.getContext("2d");
                ctx.drawImage(imgEle, 0, 0, imgEle.width, imgEle.height);
                const srcEncoded = ctx.canvas.toDataURL("image/png", 0.9);
                return srcEncoded;
            }
        }
    }

</script>
