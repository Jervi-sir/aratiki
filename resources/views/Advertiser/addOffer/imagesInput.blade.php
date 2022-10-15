<div x-data="images" class="images-input">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js" integrity="sha512-ZK6m9vADamSl5fxBPtXw6ho6A4TuX89HUbcfvxa2v2NYNT/7l8yFGJ3JlXyMN4hlNbz0il4k6DvqbIW5CCwqkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="main-img">
        <!-- preview -->
        <div x-show="preview['0']['filled']" class="preview">
            <button type="button" class="remove" @click="removeImage(0)">
                    <img src="../../images/remove.svg" alt="">
            </button>
            <div class="preview-image-container">
                <div class="preview-image">
                    <img :src="preview['0']['source']" alt="aratiki events">
                </div>
            </div>
        </div>
        <label for="main-img">
            <span class="plus">+</span>
            <span class="text">
                {{ __('advertiser.add_cover_photo')}}
            </span>
        </label>
    </div>

    <div class="optional-img-container">
        <div class="optional-img">
            <div x-show="preview['1']['filled']" class="preview">
                <button type="button" class="remove" @click="removeImage(1)">
                        <img src="../../images/remove.svg" alt="aratiki events">
                </button>
                <div class="preview-image-container">
                    <div class="preview-image">
                        <img :src="preview['1']['source']" alt="aratiki events">
                    </div>
                </div>
            </div>
            <label for="second-img">
                <span class="plus">+</span>
            </label>
        </div>
        <div class="optional-img">
            <div x-show="preview['2']['filled']" class="preview">
                <button type="button" class="remove" @click="removeImage(2)">
                        <img src="../../images/remove.svg" alt="aratiki events">
                </button>
                <div class="preview-image-container">
                    <div class="preview-image">
                        <img :src="preview['2']['source']" alt="aratiki events">
                    </div>
                </div>
            </div>
            <label for="third-img">
                <span class="plus">+</span>
            </label>
        </div>
        <div class="optional-img">
            <div x-show="preview['3']['filled']" class="preview">
                <button type="button" class="remove" @click="removeImage(3)">
                        <img src="../../images/remove.svg" alt="aratiki events">
                </button>
                <div class="preview-image-container">
                    <div class="preview-image">
                        <img :src="preview['3']['source']" alt="aratiki events">
                    </div>
                </div>
            </div>
            <label for="fourth-img">
                <span class="plus">+</span>
            </label>
        </div>
        <div class="optional-img">
            <div x-show="preview['4']['filled']" class="preview">
                <button type="button" class="remove" @click="removeImage(4)">
                        <img src="../../images/remove.svg" alt="aratiki events">
                </button>
                <div class="preview-image-container">
                    <div class="preview-image">
                        <img :src="preview['4']['source']" alt="aratiki events">
                    </div>
                </div>
            </div>
            <label for="fifth-img">
                <span class="plus">+</span>
            </label>
        </div>

        <!-- client input -->
        <input id="main-img"    type="file" accept="image/*" x-on:change="setImage($event.target, 0)" required hidden>
        <input id="second-img"  type="file" accept="image/*" x-on:change="setImage($event.target, 1)" hidden>
        <input id="third-img"   type="file" accept="image/*" x-on:change="setImage($event.target, 2)" hidden>
        <input id="fourth-img"  type="file" accept="image/*" x-on:change="setImage($event.target, 3)" hidden>
        <input id="fifth-img"   type="file" accept="image/*" x-on:change="setImage($event.target, 4)" hidden>

        <!-- compressed images -->
        <input name="images[0]" type="text" :value="preview['0']['source']" required hidden>
        <input name="images[1]" type="text" :value="preview['1']['source']" hidden>
        <input name="images[2]" type="text" :value="preview['2']['source']" hidden>
        <input name="images[3]" type="text" :value="preview['3']['source']" hidden>
        <input name="images[4]" type="text" :value="preview['4']['source']" hidden>

    </div>
</div>

<script>
    function images() {
        return {
            preview: {
                0: { source: '', filled: false },
                1: { source: '', filled: false },
                2: { source: '', filled: false },
                3: { source: '', filled: false },
                4: { source: '', filled: false },
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