@vite('resources/views/_components/info/info.scss')
<div x-data="{ open: false }"  class="helper-contaier"> 
	<div class="shake" @click="open = ! open">
		<img src="images/info_helper.svg" alt="aratiki helper">
	</div>
	<div class="menu-slide" x-show="open" x-transition style="display: none">
        <div class="bg-box" @click="open = ! open"></div>
        <div class="box">
            <div class="top">
                <img src="../../images/Logo_mini.svg" alt="aratiki logo">
								<h3 class="help">Help</h3>
                <button @click="open = ! open">
                    <img src="../../images/cancel.svg" alt="aratiki cancel">
                </button>
            </div>

            <div class="link-list">
              <details open>
                <summary>
                  <div class="title">
                    {{ __('_components.about_app_title') }}
                  </div>
                  <img src="images/arrow_down.svg" class="icon" alt="">
                </summary>
                <div class="details-info">
                  {{ __('_components.about_app_details') }}
                </div>
              </details>

              <details>
                <summary>
                  <div class="title">
                    {{ __('_components.purchase_title') }}
                  </div>
                  <img src="images/arrow_down.svg" class="icon" alt="">
                </summary>
                <div class="details-info">
                  {{ __('_components.purchase_details') }}
                </div>
              </details>
              
              <details>
                <summary>
                  <div class="title">
                    {{ __('_components.become_advertiser_title') }}
                  </div>
                  <img src="images/arrow_down.svg" class="icon" alt="">
                </summary>
                <div class="details-info">
                  {{ __('_components.become_advertiser_details') }}
                </div>
              </details>

            </div>
        </div>
    </div>
</div>




