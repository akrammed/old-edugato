<div class="ai-content-generator-drawer bg-white">
    <div class="ai-content-generator-drawer-header d-flex align-items-center justify-content-between p-15">
        <div class="">
            <h5 class="font-16 font-weight-bold">AI Content Generator</h5>
            <p class="mt-5 font-12 text-gray">Generate content using AI fast and professional</p>
        </div>

        <button type="button" class="js-right-drawer-close d-flex btn-transparent">
            <i data-feather="x" width="33" height="33" class=""></i>
        </button>
    </div>

    <div class="drawer-content p-15" data-simplebar >

        <form action="/panel/ai-contents/generate" method="post">
            <input type="hidden" name="_token" value="vuQNcZHj0SFnDzKiYWVkKQ7TPL3AMzv9f4dSE476">

            <div class="d-flex align-items-center p-15 rounded-sm bg-info-light border-gray300 mb-15">
                <div class="d-flex-center size-40 rounded-circle bg-white">
                    <img src="/assets/default/img/ai/ai-chip.svg" alt="ai" class="" width="20px" height="20px">
                </div>
                <div class="ml-5">
                    <h5 class="d-block font-weight-bold text-gray font-14">Generate content easily!</h5>
                    <p class="font-12 text-gray">Select the content type you want and describe your requirements and get the content</p>
                </div>
            </div>

                            <div class="form-group mb-5">
                    <label class="input-label">Service Type</label>
                    <select name="service_type" class="form-control">
                        <option value="">Select a service type</option>
                        <option value="text">Text</option>
                        <option value="image">Image</option>
                    </select>
                </div>
                        <div class="">
                <span class="js-ajax-service_type"></span>
                <div class="invalid-feedback d-block"></div>
            </div>

            
            <div class="js-text-templates-field mt-20 mt-20 d-none">
                <div class="form-group">
                    <label class="input-label">Service</label>
                    <select name="text_service_id" class="js-ajax-text_service_id js-text-service-templates form-control">
                        <option value="">Select a service</option>

                                                                                    <option value="1" data-enable-length="yes" data-length="5">Course Title</option>
                                                            <option value="2" data-enable-length="yes" data-length="40">Course Short Description</option>
                                                            <option value="3" data-enable-length="yes" data-length="300">Course Long Description</option>
                                                            <option value="4" data-enable-length="yes" data-length="5">Blog Title</option>
                                                            <option value="5" data-enable-length="yes" data-length="100">Blog Short Description</option>
                                                            <option value="6" data-enable-length="yes" data-length="300">Blog Long Description</option>
                                                            <option value="8" data-enable-length="yes" data-length="160">Course SEO Description</option>
                                                            <option value="9" data-enable-length="yes" data-length="160">Blog SEO Description</option>
                                                            <option value="10" data-enable-length="yes" data-length="300">Upcoming Course Description</option>
                                                            <option value="11" data-enable-length="yes" data-length="150">Quiz Question</option>
                                                            <option value="12" data-enable-length="no" data-length="">Generate FAQ</option>
                                                            <option value="13" data-enable-length="no" data-length="">Course Requirements</option>
                                                            <option value="14" data-enable-length="yes" data-length="200">Form Description</option>
                                                            <option value="15" data-enable-length="yes" data-length="200">Course Advertising Description</option>
                                                            <option value="16" data-enable-length="yes" data-length="300">&quot;About Us&quot; Page Description</option>
                                                            <option value="17" data-enable-length="yes" data-length="100">Generate Notice</option>
                                                            <option value="18" data-enable-length="yes" data-length="5">Store Product Title</option>
                                                            <option value="19" data-enable-length="yes" data-length="300">Store Product Description</option>
                                                            <option value="20" data-enable-length="yes" data-length="160">Store Product SEO Description</option>
                                                    
                        <option value="custom_text">Custom Text</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>

                                    <div class="js-for-service-fields form-group d-none">
                        <label class="input-label">Language</label>
                        <select name="language" class="js-ajax-language form-control">
                                                            <option value="EN">English</option>
                                                            <option value="AR">Arabic</option>
                                                            <option value="ES">Spanish</option>
                                                    </select>
                        <div class="invalid-feedback"></div>
                    </div>
                
                <div class="js-for-service-fields form-group d-none">
                    <label class="input-label">Keyword</label>
                    <input type="text" name="keyword" class="js-ajax-keyword form-control"/>
                    <div class="invalid-feedback"></div>
                    <p class="mt-5 font-12 text-gray">Describe in some words about what you want</p>
                </div>

                <div class="form-group js-question-field d-none">
                    <label class="input-label">Question</label>
                    <input type="text" name="question" class="js-ajax-question form-control"/>
                    <div class="invalid-feedback"></div>
                    <p class="mt-5 font-12 text-gray">Ask AI what you want</p>
                </div>


                <div class="js-service-length-field form-group d-none">
                    <label class="input-label">Length</label>
                    <input type="number" name="length" class="js-ajax-length form-control" min="1" max="" data-max-error="update.the_maximum_allowed_is"/>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            
            <div class="js-image-templates-field d-none">

                <div class="form-group mt-20">
                    <label class="input-label">Service</label>
                    <select name="image_service_id" class="js-ajax-image_service_id js-image-service-templates form-control">
                        <option value="">Select a service</option>

                                                                                    <option value="7">Genrate Image</option>
                                                    
                        <option value="custom_image">Custom Image</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group js-image-question-field d-none">
                    <label class="input-label">Question</label>
                    <input type="text" name="image_question" class="js-ajax-image_question form-control"/>
                    <div class="invalid-feedback"></div>
                    <p class="mt-5 font-12 text-gray">Ask AI what you want</p>
                </div>

                <div class="js-image-keyword-field form-group d-none">
                    <label class="input-label">Keyword</label>
                    <input type="text" name="image_keyword" class="js-ajax-image_keyword form-control"/>
                    <div class="invalid-feedback"></div>
                    <p class="mt-1 font-12 text-gray">Describe in some words about what you want</p>
                </div>

                <div class="js-image-size-field form-group d-none">
                    <label class="input-label">Image Size</label>
                    <select name="image_size" class="js-ajax-image_size form-control">
                        <option value="">Select Image Size</option>
                        <option value="256">256x256</option>
                        <option value="512">512x512</option>
                        <option value="1024">1024x1024</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>

            </div>

            <button type="button" class="js-submit-ai-content-form btn btn-primary btn-block mt-20" disabled>Disabled in Demo version</button>
        </form>

        
        <div id="generatedTextContents" class="d-none"></div>


        
        <div class="js-image-generated mt-20 p-15 bg-info-light border-gray300 rounded-sm d-none">
            <div class="">
                <h4 class="font-14 text-gray">Generated Content</h4>
                <p class="mt-5 text-gray font-12">Click on images to download them</p>
            </div>

            <div class="js-content mt-15 d-flex-center flex-wrap">

            </div>
        </div>

    </div>
</div>