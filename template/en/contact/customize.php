

  <main>
    <div class="container">
        <p><a href="../index.html"><?php coderLang::t('menu_home')?></a >> <?php coderLang::t('menu_contact')?> > <?php coderLang::t('menu_contact_customize')?></p>
    </div>

    <section class="container">
        <div class="company-tittle">
            <h3 class="center"><?php coderLang::t('menu_contact_customize')?>(en)</h3>
            <h4 class="center">Customize</h4>
        </div>
            <h4 class="center"><?php coderLang::t('menu_contact_description')?></h4>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-xs-12">
                <div class="contact-top-card">
                    <p><?php coderLang::t('web_txt_contact_t2')?></p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="contact-main-card">
            <p class="center"><?php coderLang::t('web_txt_contact_t3')?><br><?php coderLang::t('web_txt_contact_t4')?></p>
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <form method="post" id="form" action="">
                    <div class="contact-item">
                        <label class="contact-left"><?php coderLang::t('web_txt_contact_name')?><div class="contact-need">*</div></label>
                        <input type="text" class="contact-right" name="name" equired="required"> 
                    </div>
                    <div class="contact-item">
                        <label for="company" class="contact-left"><?php coderLang::t('web_txt_contact_company')?></label>
                        <input type="text" class="contact-right" name="company">              
                    </div>
                    <div class="contact-item">
                        <label for="address" class="contact-left"><?php coderLang::t('web_txt_contact_address')?><div class="contact-need">*</div></label>
                        <input type="text" class="contact-right" required="required" name="address">              
                    </div>
                    <div class="contact-item">
                        <label for="phone" class="contact-left"><?php coderLang::t('web_txt_contact_phone')?></label>
                        <input type="text" class="contact-right" name="phone">              
                    </div>
                    <div class="contact-item">
                        <label for="email" class="contact-left"><?php coderLang::t('web_txt_contact_email')?><div class="contact-need">*</div></label>
                        <input type="email" class="contact-right" required="required" name="email" id="email">              
                    </div>
                    <div class="contact-item">
                        <label for="email2" class="contact-left"><?php coderLang::t('web_txt_contact_email')?><?php coderLang::t('web_txt_contact_email_r')?><div class="contact-need">*</div></label>
                        <input type="email" class="contact-right" required="required" name="email2" id="email2">            
                    </div>
                    <!-- <div class="contact-sub-label">(再次輸入)</div>  -->
                    <div class="contact-textarea-item">
                        <label for="content"><?php coderLang::t('web_txt_contact_note')?><div class="contact-need">*</div></label>
                    </div>
                    <textarea class="contact-textarea" rows="10"required="required" name="content"></textarea>
                    <div class="left" style="margin-left:8%"><input type="submit"  class="button-main button-margin" value="<?php coderLang::t('web_txt_contact_submit')?>"></div> 
                </form>           
            </div>
        <div class="col-md-3"></div>
        </div>
        <div class="center-col">
        <h3><?php coderLang::t('web_txt_contact_tel')?></h3>
        <h1><?php coderLang::t('web_txt_contact_tel_jp')?></h1>
        <h3><?php coderLang::t('web_txt_contact_tel_tw')?></h3>
        <h4><?php coderLang::t('web_txt_contact_tel_note')?></h4>
      </div>
            
        </div>

    </section>
  </main>

  

