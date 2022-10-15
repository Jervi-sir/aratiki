<div x-data="images" class="images-input">
    <div class="main-img">
        <!-- preview -->
        <div x-show="preview['0']['source']" class="preview">
            <button type="button" class="remove" @click="removeImage(0)">
                    <img src="../../images/remove.svg" alt="aratiki edit profile">
            </button>
            <div class="preview-image-container">
                <div class="preview-image">
                    <img :src="preview['0']['source']" alt="aratiki edit profile">
                </div>
            </div>
        </div>
        <label for="main-img">
            <span class="plus">+</span>
            <span class="text">Add Cover Photos</span>
        </label>
    </div>
    <!-- client input -->
    <input id="main-img" type="file" accept="image/*" x-on:change="setImage($event.target, 0)" required hidden>
    <!-- compressed images -->
    <input name="image" type="text" :value="preview['0']['source']" required hidden>
</div>

<script>
    function images() {
        return {
            preview: {
                0: { source: {!! json_encode($user['image']) !!}, filled: false },
            },

            removeImage(whichOne) {
                this.preview[whichOne]['source'] = '';
                this.preview[whichOne]['filled'] = false;
            },

            setImage(file, whichOne) {
                var blobURL = URL.createObjectURL(file.files[0])

                let image = this.preview[whichOne];
                
                var imgEle = new Image();
                imgEle.src = blobURL;
                imgEle.onload = function()  {
                    var wanterSize = 500;
                    
                    /*--- Create Canva ---*/
                    var canvas = document.createElement('canvas');
                    canvas.width = wanterSize;
                    canvas.height = wanterSize;
                    const ctx = canvas.getContext("2d");
                    
                    var width = imgEle.width, height = imgEle.height;
                    if(width > height) {
                        var ratio = wanterSize / height;
                        ctx.drawImage(imgEle, -(((width * ratio) / 2) - (wanterSize / 2)), 0, width * ratio, wanterSize);
                    } else {
                        var ratio = wanterSize / width;
                        ctx.drawImage(imgEle, 0, -(((height * ratio) / 2) - (wanterSize / 2)), wanterSize, height * ratio);
                    }

                    const srcEncoded = ctx.canvas.toDataURL("image/png", 0.2);
                    image['source'] = srcEncoded;
                    image['filled'] = true;

                }

            },

        }
    }


</script>