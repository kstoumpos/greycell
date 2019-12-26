<?php
    function footer_get_mail(){
        ?>
        <!--Footer Section-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody>
                                  <tr>
                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <em>This is an automatically generated notification email. Please do not reply.</em><br>
                                        <strong><a href="<?php echo _e("https://grey-cell.co.uk/support/?utm_source=autoemail") ?>">Contact Us</a> | <a href="https://www.facebook.com/GreyCelluk/?utm_source=autoemail">Facebook</a> | <a href="https://www.linkedin.com/company/11506547?utm_source=autoemail">LinkedIn</a> | <a href="https://twitter.com/GreyCell_UK?utm_source=autoemail">Tweeter</a> <br>
                                        <br>
                                        <em>Copyright © 2019 GreyCell Ltd, All rights reserved.</em><br>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </table>
                </center>
            </body>

            </html>
        <!--End of Footer Section-->
        <?
        $footer_for_mail = ob_get_contents();
        return $footer_for_mail;
    }

    function header_get_mail(){
        ?>
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title></title>

                <style type="text/css">
                    p{
                        margin:10px 0;
                        padding:0;
                    }
                    table{
                        border-collapse:collapse;
                    }

                    h1,h2,h3,h4,h5,h6{
                        display:block;
                        margin:0;
                        padding:0;
                    }
                    img,a img{
                        border:0;
                        height:auto;
                        outline:none;
                        text-decoration:none;
                    }
                    body,#bodyTable,#bodyCell{
                        height:100%;
                        margin:0;
                        padding:0;
                        width:100%;
                    }
                    .mcnPreviewText{
                        display:none !important;
                    }
                    #outlook a{
                        padding:0;
                    }
                    img{
                        -ms-interpolation-mode:bicubic;
                    }
                    table{
                        mso-table-lspace:0pt;
                        mso-table-rspace:0pt;
                    }
                    .ReadMsgBody{
                        width:100%;
                    }
                    .ExternalClass{
                        width:100%;
                    }
                    p,a,li,td,blockquote{
                        mso-line-height-rule:exactly;
                    }
                    a[href^=tel],a[href^=sms]{
                        color:inherit;
                        cursor:default;
                        text-decoration:none;
                    }
                    p,a,li,td,body,table,blockquote{
                        -ms-text-size-adjust:100%;
                        -webkit-text-size-adjust:100%;
                    }
                    .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
                        line-height:100%;
                    }
                    a[x-apple-data-detectors]{
                        color:inherit !important;
                        text-decoration:none !important;
                        font-size:inherit !important;
                        font-family:inherit !important;
                        font-weight:inherit !important;
                        line-height:inherit !important;
                    }
                    #bodyCell{
                        padding:10px;
                    }
                    .templateContainer{
                        max-width:600px !important;
                    }
                    a.mcnButton{
                        display:block;
                    }
                    .mcnImage,.mcnRetinaImage{
                        vertical-align:bottom;
                    }
                    .mcnTextContent{
                        word-break:break-word;
                    }
                    .mcnTextContent img{
                        height:auto !important;
                    }
                    .mcnDividerBlock{
                        table-layout:fixed !important;
                    }
                /*
                @tab Page
                @section Background Style
                @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
                */
                    body,#bodyTable{
                        /*@editable*/background-color:#FAFAFA;
                    }
                /*
                @tab Page
                @section Background Style
                @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
                */
                    #bodyCell{
                        /*@editable*/border-top:0;
                    }
                /*
                @tab Page
                @section Email Border
                @tip Set the border for your email.
                */
                    .templateContainer{
                        /*@editable*/border:0;
                    }
                /*
                @tab Page
                @section Heading 1
                @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
                @style heading 1
                */
                    h1{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:26px;
                        /*@editable*/font-style:normal;
                        /*@editable*/font-weight:bold;
                        /*@editable*/line-height:125%;
                        /*@editable*/letter-spacing:normal;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Page
                @section Heading 2
                @tip Set the styling for all second-level headings in your emails.
                @style heading 2
                */
                    h2{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:22px;
                        /*@editable*/font-style:normal;
                        /*@editable*/font-weight:bold;
                        /*@editable*/line-height:125%;
                        /*@editable*/letter-spacing:normal;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Page
                @section Heading 3
                @tip Set the styling for all third-level headings in your emails.
                @style heading 3
                */
                    h3{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:20px;
                        /*@editable*/font-style:normal;
                        /*@editable*/font-weight:bold;
                        /*@editable*/line-height:125%;
                        /*@editable*/letter-spacing:normal;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Page
                @section Heading 4
                @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
                @style heading 4
                */
                    h4{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:18px;
                        /*@editable*/font-style:normal;
                        /*@editable*/font-weight:bold;
                        /*@editable*/line-height:125%;
                        /*@editable*/letter-spacing:normal;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Preheader
                @section Preheader Style
                @tip Set the background color and borders for your email's preheader area.
                */
                    #templatePreheader{
                        /*@editable*/background-color:#FAFAFA;
                        /*@editable*/background-image:none;
                        /*@editable*/background-repeat:no-repeat;
                        /*@editable*/background-position:center;
                        /*@editable*/background-size:cover;
                        /*@editable*/border-top:0;
                        /*@editable*/border-bottom:0;
                        /*@editable*/padding-top:9px;
                        /*@editable*/padding-bottom:9px;
                    }
                /*
                @tab Preheader
                @section Preheader Text
                @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
                */
                    #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
                        /*@editable*/color:#656565;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:12px;
                        /*@editable*/line-height:150%;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Preheader
                @section Preheader Link
                @tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
                */
                    #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
                        /*@editable*/color:#656565;
                        /*@editable*/font-weight:normal;
                        /*@editable*/text-decoration:underline;
                    }
                /*
                @tab Header
                @section Header Style
                @tip Set the background color and borders for your email's header area.
                */
                    #templateHeader{
                        /*@editable*/background-color:#FFFFFF;
                        /*@editable*/background-image:none;
                        /*@editable*/background-repeat:no-repeat;
                        /*@editable*/background-position:center;
                        /*@editable*/background-size:cover;
                        /*@editable*/border-top:0;
                        /*@editable*/border-bottom:0;
                        /*@editable*/padding-top:9px;
                        /*@editable*/padding-bottom:0;
                    }
                /*
                @tab Header
                @section Header Text
                @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
                */
                    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:16px;
                        /*@editable*/line-height:150%;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Header
                @section Header Link
                @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
                */
                    #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
                        /*@editable*/color:#2BAADF;
                        /*@editable*/font-weight:normal;
                        /*@editable*/text-decoration:underline;
                    }
                /*
                @tab Body
                @section Body Style
                @tip Set the background color and borders for your email's body area.
                */
                    #templateBody{
                        /*@editable*/background-color:#FFFFFF;
                        /*@editable*/background-image:none;
                        /*@editable*/background-repeat:no-repeat;
                        /*@editable*/background-position:center;
                        /*@editable*/background-size:cover;
                        /*@editable*/border-top:0;
                        /*@editable*/border-bottom:2px solid #EAEAEA;
                        /*@editable*/padding-top:0;
                        /*@editable*/padding-bottom:9px;
                    }
                /*
                @tab Body
                @section Body Text
                @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
                */
                    #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
                        /*@editable*/color:#202020;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:16px;
                        /*@editable*/line-height:150%;
                        /*@editable*/text-align:left;
                    }
                /*
                @tab Body
                @section Body Link
                @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
                */
                    #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
                        /*@editable*/color:#2BAADF;
                        /*@editable*/font-weight:normal;
                        /*@editable*/text-decoration:underline;
                    }
                /*
                @tab Footer
                @section Footer Style
                @tip Set the background color and borders for your email's footer area.
                */
                    #templateFooter{
                        /*@editable*/background-color:#FAFAFA;
                        /*@editable*/background-image:none;
                        /*@editable*/background-repeat:no-repeat;
                        /*@editable*/background-position:center;
                        /*@editable*/background-size:cover;
                        /*@editable*/border-top:0;
                        /*@editable*/border-bottom:0;
                        /*@editable*/padding-top:9px;
                        /*@editable*/padding-bottom:9px;
                    }
                /*
                @tab Footer
                @section Footer Text
                @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
                */
                    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
                        /*@editable*/color:#656565;
                        /*@editable*/font-family:Helvetica;
                        /*@editable*/font-size:12px;
                        /*@editable*/line-height:150%;
                        /*@editable*/text-align:center;
                    }
                /*
                @tab Footer
                @section Footer Link
                @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
                */
                    #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
                        /*@editable*/color:#656565;
                        /*@editable*/font-weight:normal;
                        /*@editable*/text-decoration:underline;
                    }
                @media only screen and (min-width:768px){
                    .templateContainer{
                        width:600px !important;
                    }

                    }	@media only screen and (max-width: 480px){
                            body,table,td,p,a,li,blockquote{
                                -webkit-text-size-adjust:none !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            body{
                                width:100% !important;
                                min-width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            #bodyCell{
                                padding-top:10px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnRetinaImage{
                                max-width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImage{
                                width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
                                max-width:100% !important;
                                width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnBoxedTextContentContainer{
                                min-width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageGroupContent{
                                padding:9px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
                                padding-top:9px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
                                padding-top:18px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageCardBottomImageContent{
                                padding-bottom:9px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageGroupBlockInner{
                                padding-top:0 !important;
                                padding-bottom:0 !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageGroupBlockOuter{
                                padding-top:9px !important;
                                padding-bottom:9px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnTextContent,.mcnBoxedTextContentColumn{
                                padding-right:18px !important;
                                padding-left:18px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
                                padding-right:18px !important;
                                padding-bottom:0 !important;
                                padding-left:18px !important;
                            }

                    }	@media only screen and (max-width: 480px){
                            .mcpreview-image-uploader{
                                display:none !important;
                                width:100% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Heading 1
                        @tip Make the first-level headings larger in size for better readability on small screens.
                        */
                            h1{
                                /*@editable*/font-size:22px !important;
                                /*@editable*/line-height:125% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Heading 2
                        @tip Make the second-level headings larger in size for better readability on small screens.
                        */
                            h2{
                                /*@editable*/font-size:20px !important;
                                /*@editable*/line-height:125% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Heading 3
                        @tip Make the third-level headings larger in size for better readability on small screens.
                        */
                            h3{
                                /*@editable*/font-size:18px !important;
                                /*@editable*/line-height:125% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Heading 4
                        @tip Make the fourth-level headings larger in size for better readability on small screens.
                        */
                            h4{
                                /*@editable*/font-size:16px !important;
                                /*@editable*/line-height:150% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Boxed Text
                        @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
                        */
                            .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
                                /*@editable*/font-size:14px !important;
                                /*@editable*/line-height:150% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Preheader Visibility
                        @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
                        */
                            #templatePreheader{
                                /*@editable*/display:block !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Preheader Text
                        @tip Make the preheader text larger in size for better readability on small screens.
                        */
                            #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
                                /*@editable*/font-size:14px !important;
                                /*@editable*/line-height:150% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Header Text
                        @tip Make the header text larger in size for better readability on small screens.
                        */
                            #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
                                /*@editable*/font-size:16px !important;
                                /*@editable*/line-height:150% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Body Text
                        @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
                        */
                            #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
                                /*@editable*/font-size:16px !important;
                                /*@editable*/line-height:150% !important;
                            }

                    }	@media only screen and (max-width: 480px){
                        /*
                        @tab Mobile Styles
                        @section Footer Text
                        @tip Make the footer content text larger in size for better readability on small screens.
                        */
                            #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
                                /*@editable*/font-size:14px !important;
                                /*@editable*/line-height:150% !important;
                            }

                            }
                </style>

            </head>
        <?php
        $header_for_mail = ob_get_contents();
        return $header_for_mail;
    }

    function ProjectTheme_send_email($recipients, $subject = '', $message = '') {

        $ProjectTheme_email_addr_from 	= get_option('ProjectTheme_email_addr_from');
        $ProjectTheme_email_name_from  	= get_option('ProjectTheme_email_name_from');

        $message = stripslashes($message);
        $subject = stripslashes($subject);

        $hh = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=' . get_bloginfo('charset'),
            sprintf( 'X-Mailer: PHP/%s', phpversion() )
        );

        if(empty($ProjectTheme_email_name_from)) $ProjectTheme_email_name_from  = "Project Theme";
        if(empty($ProjectTheme_email_addr_from)) $ProjectTheme_email_addr_from  = "projectTheme@wordpress.org";

        $headers = 'From: '. $ProjectTheme_email_name_from .' <'. $ProjectTheme_email_addr_from .'>' . PHP_EOL;
        $ProjectTheme_allow_html_emails = get_option('ProjectTheme_allow_html_emails');
        if($ProjectTheme_allow_html_emails != "yes") $html = false;
        else $html = true;

        $oktosend = true;

        $oktosend = apply_filters('ProjectTheme_ok_to_send_email',$oktosend);

        if($oktosend) {
            if (1) {
                $mailtext = $message;
                return wp_mail($recipients, $subject, $mailtext, $hh);
            } else {
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-Type: text/plain; charset=\"". get_bloginfo('charset') . "\"\n";
                $message = preg_replace('|&[^a][^m][^p].{0,3};|', '', $message);
                $message = preg_replace('|&amp;|', '&', $message);
                $mailtext = wordwrap(strip_tags($message), 80, "\n");
                return wp_mail($recipients, stripslashes($subject), stripslashes($mailtext)); //, $hh);
            }
        }
    }

    #THIS!!! ADMIN
function ProjectTheme_send_email_posted_project_approved_admin($pid) {
    $enable 	= get_option('ProjectTheme_new_project_email_approve_admin_enable');
    $multilang_subject = _e('Approved and published', 'my-email-subject');
    $subject  == $multilang_subject;
    $message 	= get_option('ProjectTheme_new_project_email_approve_admin_message');

    $opt = get_post_meta($pid,'ProjectTheme_send_email_posted_project_approved_admin', true);

    if($enable != "no" and empty($opt)):

        update_post_meta($pid,'ProjectTheme_send_email_posted_project_approved_admin', '1');

        $post 			= get_post($pid);
        $user 			= get_userdata($post->post_author);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


        $find 		= array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
           $replace 	= array($user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid));

        $tag		= 'ProjectTheme_send_email_posted_project_approved_admin';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------

        $email = get_bloginfo('admin_email');
        ProjectTheme_send_email($email, $subject, $message);

    endif;
}

    #THIS!!! GOOD
    function ProjectTheme_send_mail_on_reset_password($user_login,$user_email,$key){

        $multilang_subject = _e('Password reset', 'my-email-subject');
        $subject  == $multilang_subject;

        $reset_url = '' . home_url()."/wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login);

        //Mail Message
        ob_start();
        ?>
        <?php header_get_mail(); ?>
        <body>
            <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
            <center>
              <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                  <td align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                      <tr>
                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                          <tbody class="mcnImageBlockOuter">
                            <tr>
                              <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                  <tbody>
                                    <tr>
                                      <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                        <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                        <tbody class="mcnTextBlockOuter">
                          <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody>
                                  <tr>
                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                      <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong>Ανάκτηση Κωδικού</strong>
                                      </span>
                                    </span>
                                  </h1>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td valign="top" id="templateBody">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                      <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                          <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody>
                              <tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                  <?php echo _e("You have requested password reset for user: "); ?> <?php echo $user_login;?><br>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                      <tbody class="mcnTextBlockOuter">
                        <tr>
                          <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                              <tbody>
                                <tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <?php echo _e("If it wasn't you, then just ignore this message. To change your password click the following link: "); ?>
                                    <?php echo $reset_url;?><br>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                      <tbody class="mcnTextBlockOuter">
                        <tr>
                          <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                              <tbody>
                                <tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?><a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                    <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                    <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td valign="top" id="templateFooter">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                      <tbody class="mcnDividerBlockOuter">
                        <tr>
                          <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                              <tbody>
                                <tr>
                                  <td>
                                    <span></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>

        <?php footer_get_mail(); ?>
        <?php
        //End of Mail Message
        $message = ob_get_contents();
        ob_end_clean();

        ProjectTheme_send_email($user_email, $subject, $message);
    }

    #THIS!!! GOOD
    function ProjectTheme_send_mail_on_new_password($user_email,$new_pass){

        $multilang_subject = _e('Your new password', 'my-email-subject');
        $subject  == $multilang_subject;
        $find 		= array('##new_password##');
        $replace 	= array($new_pass);

        //Mail Message
        ob_start();
        ?>
        <?php header_get_mail(); ?>
            <body>
              <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></span>
              <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                  <tr>
                    <td align="center" valign="top" id="bodyCell">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                        <tr>
                          <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                            <tbody class="mcnImageBlockOuter">
                              <tr>
                                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                  <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                    <tbody>
                                      <tr>
                                        <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                          <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                              <tr>
                                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong><?php echo _e("Welcome to GreyCell") ?></strong>
                                        </span>
                                      </span>
                                    </h1>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                      <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                          <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody>
                              <tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                  <?php echo _e("Your new password is"); ?>
                                    <!-- Ο Νέος Κωδικός σου για την είσοδο σου στην πλατφόρμα είναι: -->
                                    <?php echo $new_pass;?>
                                    <br>
                                    <br>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                      <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                          <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody>
                              <tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                  <?php echo _e("Please change you password, from your account setting after your login"); ?>
                                    <!-- Παρακαλούμε, μετά την είσοδο σου, ανανέωσε τον κωδικό σου από τις ρυθμίσεις προφίλ. -->
                                    <br>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                      <tbody class="mcnTextBlockOuter">
                        <tr>
                          <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                              <tbody>
                                <tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                    <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                    <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                    <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td valign="top" id="templateFooter">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                    </table>

        <?php footer_get_mail(); ?>
        <?php
        //End of Mail Message
        $message = ob_get_contents();
        ob_end_clean();

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ProjectTheme_send_email($user_email, $subject, $message);
    }

    #THIS!!! GOOD
    function ProjectTheme_send_email_on_rectract_bid_owner($pid,$uid,$project_author) {

        $multilang_subject = _e('Retract bid for project', 'my-email-subject');
        $subject  == $multilang_subject;

        $post 			= get_post($pid);
        $user 			= get_userdata($project_author);
        $user_provider  = get_userdata($uid);

        $find 		= array('##username##', '##project_name##','##provider##');
        $replace 	= array($user->user_login, $post->post_title, $user_provider->user_login);

        $tag		= 'ProjectTheme_send_email_on_rectract_bid_owner';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                        <tr>
                            <td align="center" valign="top" id="bodyCell">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                    <tr>
                                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong><?php echo _e("Recall offer"); ?></strong></span></font></h1>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login;?>,<br>
                                    <br>
                                    <?php echo _e("The provider "); ?><?php echo $user_provider->user_login; ?>
                                    <?php echo _e("has recalled his bid on your project:"); ?>
                                    <!-- έχει ανακαλέσει την προσφορά του για το project: -->
                                     <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?></strong> .<br><br>
                                     <?php echo _e("You can contact him for further info."); ?>
                                    <!-- Μπορείς να επικοινωνήσεις μαζί του για περισσότερες πληροφορίες. -->
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        //---------------------------------------------

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);
    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_rectract_bid_bidder($pid,$uid,$project_author) {

        $multilang_subject = _e('Retract bid for project', 'my-email-subject');
        $subject  == $multilang_subject;

        $post 			= get_post($pid);
        $user 			= get_userdata($uid);

        $find 		= array('##username##', '##project_name##');
        $replace 	= array($user->user_login, $post->post_title);

        $tag		= 'ProjectTheme_send_email_on_rectract_bid_bidder';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">
          </span>
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                  <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                </td>
            </tr>
        </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong><?php echo _e("Recall offer"); ?></strong></span></font></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?> ,<br>
                                    <br>
                                    <?php echo _e("You have recalled your offer for the project: "); ?>
                                    <!-- Έχεις ανακαλέσει την προσφορά σου για το Project: -->
                                    <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>.<br>

                                    <!-- Ο Παραγγελιοδότης έχει ενημερωθεί για την ανάκληση,
                                    ωστόσο εάν αυτό έγινε καταλάθος, παρακαλούμε επικοινώνησε μαζί μας: support@grey-cell.co.uk. -->
                                    <?php echo _e("The contractor has been informed that your bid has been recalled. If that happened by mistake, please let us know at"); ?>
                                    <a href="mailto:support@grey-cell.co.uk"> support@grey-cell.co.uk</a>.
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();
        //---------------------------------------------

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);
    }
    #THIS!!! ADMIN
    function ProjectTheme_send_email_posted_project_not_approved_admin($pid) {
        $enable 	= get_option('ProjectTheme_new_project_email_not_approve_admin_enable');
        $multilang_subject = _e('Project not approved by admin', 'my-email-subject');
        $subject  == $multilang_subject;
        $message 	= get_option('ProjectTheme_new_project_email_not_approve_admin_message');

        $opt1 = get_post_meta($pid, 'ProjectTheme_send_email_posted_project_not_approved_admina', true);

        if($enable != "no" and empty($opt1)):

            update_post_meta($pid, 'ProjectTheme_send_email_posted_project_not_approved_admina', rand(1,99));
            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


            $find 		= array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
               $replace 	= array($user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid));

            $tag		= 'ProjectTheme_send_email_posted_project_not_approved_admin';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            $email = get_bloginfo('admin_email');

            ProjectTheme_send_email($email, $subject, $message);

        endif;

    }

    #THIS!!! GOOD
    function ProjectTheme_send_email_on_completed_project_to_bidder($pid, $bidder_id,$contractor_id) {
        $multilang_subject = _e('Project completed', 'my-email-subject');
        $subject  == $multilang_subject;

        $post 			= get_post($pid);
        $user 			= get_userdata($bidder_id);
        $contractor     = get_userdata($contractor_id);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


        $find 		= array('##contractor_username##','##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
        $replace 	= array($contractor->user_login,$user->user_login, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid));

        $tag		= 'ProjectTheme_send_email_on_completed_project_to_bidder';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------
        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->

        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong><?php echo _e("Contractor confirmation"); ?></strong></span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("The contractor has confirmed that the project "); ?>
                                    <!-- Ο παραγγελιοδότης επιβεβαίωσε πως το project -->
                                     <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?> </strong>
                                    <?php echo _e("has been completed"); ?>
                                    <!-- έχει ολοκληρωθεί ικανοποιητικά και το σημείωσε ώς ολοκληρωμένο. -->
                                    <?php echo _e("Please rate your cooperation with "); ?>
                                    <!-- Παρακαλούμε αξιολόγησε την συνεργασία σου με τον  -->
                                    <?php echo $contractor->user_login; ?>.

                                    <br>
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif">You can see your projects in <a href="https://www.grey-cell.co.uk/my-account/" target="_blank">your account</a>.</span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();


        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_escrow_project_to_bidder2($pid, $bidder_id, $es) {
        $enable 	= get_option('ProjectTheme_escrow_project_bidder_email_enable');
        $multilang_subject = _e('Escrow Received', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_escrow_project_bidder_email_message');

        if($enable != "no"):

            $es = projecttheme_get_show_price($es);
            $post 			= get_post($pid);
            $user 			= get_userdata($bidder_id);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


            $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##', '##escrow_amount##');
               $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid), $es);

            $tag		= 'ProjectTheme_send_email_on_escrow_project_to_bidder2';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($user->user_email, $subject, $message);

        endif;
    }

    #THIS!!! GOOD
    function ProjectTheme_send_email_on_completed_project_to_owner($pid) {
        $multilang_subject = _e('Project completed', 'my-email-subject');
        $subject  == $multilang_subjects;


        $post 			= get_post($pid);
        $user 			= get_userdata($post->post_author);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


        $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
            $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid));

        $tag		= 'ProjectTheme_send_email_on_completed_project_to_owner';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------
        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong>Ολοκλήρωση Project
                                        </strong></span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("You have confirmed that the project "); ?>
                                    <!-- Έχεις επιβεβαιώσει το project -->
                                     <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>
                                     <?php echo _e("has been completed"); ?>
                                      <!-- ως ολοκληρωμένο. -->
                                      <?php echo _e("Thank you for choosing Greycell for yoyr project."); ?><br>
                                      <!-- Σ' ευχαριστούμε που επέλεξες τη Greycell για το project σου. -->
                                    <!-- Παρακαλούμε αξιολόγησε τη συνεργασία σου με τον επαγγελματία -->
                                    <?php echo _e("Please rate your coopertion with the provider"); ?>
                                     <a href="<?php echo _e("https://www.grey-cell.co.uk/my-account/feedback-reviews/"); ?>" target="_blank"><?php echo _e("here"); ?></a>. 
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();


        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_escrow_project_to_owner($pid, $es) {
        $enable 	= get_option('ProjectTheme_escrow_project_owner_email_enable');
        $multilang_subject = _e('Escrow enabled', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_escrow_project_owner_email_message');

        if($enable != "no"):

            $es = projecttheme_get_show_price($es);
            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


            $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##','##escrow_amount##');
               $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid), $es);

            $tag		= 'ProjectTheme_send_email_on_escrow_project_to_owner';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($user->user_email, $subject, $message);

        endif;
    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_delivered_project_to_bidder($pid, $bidder_id) {

        $multilang_subject = _e('Project delivered', 'my-email-subject');
        $subject  == $multilang_subjects;


        $post 			= get_post($pid);
        $user 			= get_userdata($bidder_id);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


        $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
        $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid));

        $tag		= 'ProjectTheme_send_email_on_delivered_project_to_bidder';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">

                                    <a href="*|ARCHIVE|*" target="_blank"> in your browser</a>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong>Ολοκλήρωση Project</strong></span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <br>
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("You have marked the project "); ?>
                                    <!-- Έχεις σημειώσει το project  -->
                                    <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>
                                    <?php echo _e(" as completed. You will beinformed when the contractor confirmts that the project is completed."); ?>
                                     <!-- ως ολοκληρωμένο. Θα ενημερωθείς μόλις ο παραγγελιοδότης επιβεβαιώσει την ολοκλήρωση. -->
                                    <br>
                                    <?php echo _e("You can track the progress of your projects at "); ?>
                                    <!-- Μπορείς να παρακολουθείς την πορεία των project σου ανά πάσα στιγμή από  -->
                                    <a href="<?php echo _e("https://www.grey-cell.co.uk/my-account/"); ?>" target="_blank">
                                      <?php echo _e("your account page"); ?></a>.
                                    <br>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        $email = get_bloginfo('admin_email');
        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_delivered_project_to_owner($pid) {
        $multilang_subject = _e('Project delivered', 'my-email-subject');
        $subject  == $multilang_subjects;

        $post 			= get_post($pid);
        $user 			= get_userdata($post->post_author);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


        $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
        $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid));

        $tag		= 'ProjectTheme_send_email_on_delivered_project_to_owner';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------
        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                        <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong>Παράδοση Project</strong></span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("The provider "); ?>
                                    <?php echo _e("has marked as completed the project "); ?>
                                    <!-- επισήμανε πως έχει ολοκληρώσει τις εργασίες για το project  -->
                                    <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>
                                    <!-- και αναμένει την επιβεβαίωσή σου. -->
                                    <?php echo _e("and is waiting for your confirmation. "); ?>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_message_board_owner($pid, $owner_id, $sender_id) {
        $enable 	= get_option('ProjectTheme_message_board_owner_email_enable');
        $multilang_subject = _e('New Message on Message Board', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_message_board_owner_email_message');

        if($enable != "no"):

            $owner_id 			= get_userdata($owner_id);
            $sender_id			= get_userdata($sender_id);


            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
            $project 		= get_post($pid);

            $find 		= array('##username##', '##message_owner_username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##','##project_name##','##project_link##');
               $replace 	= array($owner_id->user_login, $sender_id->user_login, $site_login_url, $site_name, home_url(), $account_url, $project->post_title, get_permalink($pid));

            $tag		= 'ProjectTheme_send_email_on_message_board_owner';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($owner_id->user_email, $subject, $message);

        endif;
    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_message_board_bidder($pid, $owner_id, $sender_id) {
        $enable 	= get_option('ProjectTheme_message_board_bidder_email_enable');
        $multilang_subject = _e('New Message on Message Board', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_message_board_bidder_email_message');

        if($enable != "no"):

            $owner_id 			= get_userdata($owner_id);
            $sender_id			= get_userdata($sender_id);


            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
            $project = get_post($pid);

            $find 		= array('##project_username##', '##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##','##project_name##','##project_link##');
               $replace 	= array($owner_id->user_login, $sender_id->user_login, $site_login_url, $site_name, home_url(), $account_url, $project->post_title, get_permalink($pid));

            $tag		= 'ProjectTheme_send_email_on_message_board_bidder';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($sender_id->user_email, $subject, $message);

        endif;
    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_priv_mess_received($sender_uid, $receiver_uid,$message_content, $attach_id) {
        $multilang_subject = _e('New message', 'my-email-subject');
        $subject  == $multilang_subjects;

        $user 			= get_userdata($receiver_uid);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
        $sndr			= get_userdata($sender_uid);


        $find 		= array('##sender_username##', '##receiver_username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##','##message##');
        $replace 	= array($sndr->user_login, $user->user_login, $site_login_url, $site_name, home_url(), $account_url,nl2br(strip_tags($message_content)));

        $tag		= 'ProjectTheme_send_email_on_priv_mess_received';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------
        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
          <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
              <tr>
                <td align="center" valign="top" id="bodyCell">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                    <tr>
                      <td valign="top" id="templatePreheader">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                          <tbody class="mcnImageBlockOuter">
                            <tr>
                              <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                  <tbody>
                                    <tr>
                                      <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                        <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">
                                        <a href="*|ARCHIVE|*" target="_blank"> in your browser</a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" id="templateHeader">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong><?php echo _e("New Message"); ?></strong></span></span></h1>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" id="templateBody">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">" width="600" style="width:600px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> </span><?php echo $user->user_login; ?><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif">, <br>
                                          <br>
                                          <?php echo _e("You have received a message from user "); ?>
                                          <!-- Έχεις λάβει ένα νέο μήνυμα από τον χρήστη -->
                                          <strong><?php echo $sndr->user_login; ?></strong>:<br>
                                          <?php echo nl2br(strip_tags($message_content)); ?><br><br>
                                          <?php
                                              if(!empty($attach_id))
                                              echo sprintf(__('File Attached: %s','ProjectTheme') , '<a href="'.wp_get_attachment_url($attach_id).'">'.wp_get_attachment_url($attach_id)."</a>") ;
                                          ?> <br>
                                          <br>
                                          <?php echo _e("Click"); ?> <a href="<?php echo _e("grey-cell.co.uk/my-account/private-messages/?rdr=&pg=inbox"); ?>"><?php echo _e("here"); ?></a> <?php echo _e("to reply"); ?>.
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                        <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                        <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                        <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_rated_user($pid, $rated_user_id) {
        $multilang_subject = _e('Your rating for the latest project', 'my-email-subject');
        $subject  == $multilang_subjects;

        $post 			= get_post($pid);
        $user 			= get_userdata($rated_user_id);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

        global $wpdb;
        $s = "select * from ".$wpdb->prefix."project_ratings where pid='$pid' AND touser='$rated_user_id'";
        $r = $wpdb->get_results($s);
        $row = $r[0];
        //The one who rated credentials
        $rating_author_id = $row->fromuser;
        $rating_author_name = get_userdata($rating_author_id);

        $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##','##rating##','##comment##','##rating_author##');
        $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid),$rating, $comment,$rating_author_name->user_login);

        $tag		= 'ProjectTheme_send_email_on_rated_user';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tr>
                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong>Νέα Αξιολόγηση</strong></span></font></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("The user "); ?>
                                    <?php echo $rating_author_name->user_login; ?>
                                    <?php echo _e("has just rated your Project "); ?>
                                    <!-- μόλις αξιολόγησε την συνεργασία σας για το Project -->
                                     <?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?>.
                                     <?php echo _e("To see the review you will have to rate your cooperation "); ?>
                                    <!-- Για να δεις την αξιολόγηση που έλαβες, θα πρέπει να αξιολογήσεις και εσύ την συνεργασία σας -->
                                    <a href="<?php echo _e("https://www.grey-cell.co.uk/my-account/feedback-reviews/"); ?>"><?php echo _e("here"); ?></a>.
                                    <br>
                                    <?php echo _e("You will have 10 days time to rate your cooperation, after that your rating "); ?>
                                    <!-- 'Εχεις στη διαθεσή σου 10 μέρες για να δώσεις την δική σου αξιολόγηση για τη συνεργασία σας,
                                    μετά από τις οποίες ωστόσο η αξιολόγηση του  -->
                                    <?php echo $rating_author_name->user_login; ?>
                                    <!-- θα δημοσιευθεί και εσύ δεν θα μπορείς να καταχωρήσεις τη δική σου για το Project -->
                                    <?php echo _e("will be public and you wont be able to publish your rating for the Project "); ?>
                                     <?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?>.
                                    <br>
         
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody>
                              <tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                  <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                  <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                  <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                  <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                </td>
                              </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        //---------------------------------------------

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! ADMIN
    function ProjectTheme_send_email_on_admin_approve_rating($pid,$rated_user_id){
        $enable 	= get_option('ProjectTheme_approve_rate_email_enable');
        $multilang_subject = _e('Your rating has been appoved', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_approve_rate_email_message');

        if($enable != "no"):

            $user = get_userdata($rated_user_id);

            global $wpdb;
            $s = "select * from ".$wpdb->prefix."project_ratings where pid='$pid' AND touser='$rated_user_id'";
            $r = $wpdb->get_results($s);
            $row = $r[0];

            //The one who rated credentials
            $rating_author_id = $row->fromuser;
            $rating_author_name = get_userdata($rating_author_id);

            $find = array('##username##','##rating_author##','##review_comments##','##personal_review##',
                        '##consistency_grade##','##communication_grade##','##overall_grade##',
                        '##work_again##', '##pay_method##');
            $replace = array($user->user_login,$rating_author_name->user_login,$row->review_comments,$row->personal_review,
                            $row->consistency_grade,$row->communication_grade,$row->overall_grade,
                            $row->work_again,$row->pay_method);
            $tag = 'ProjectTheme_send_email_on_admin_approve_rating';

            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            ProjectTheme_send_email('testto@grey-cell.com', $subject, $message);
        endif;
    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_win_to_loser($pid, $loser_uid) {
        $enable 	= get_option('ProjectTheme_won_project_loser_email_enable');
        $multilang_subject = _e('Bidding Ended. You did NOT win', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_won_project_loser_email_message');

        if($enable != "no"):

            $post 			= get_post($pid);
            $user 			= get_userdata($loser_uid);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

            $projectTheme_get_winner_bid = projectTheme_get_winner_bid($pid);

            $usrnm = get_userdata($projectTheme_get_winner_bid->uid);
            $winner_bid_username = $usrnm->user_login;
            $winner_bid_value = projecttheme_get_show_price($projectTheme_get_winner_bid->bid);

            $skk = projectTheme_get_bid_by_uid($pid, $loser_uid);

            $user_bid_value 		= projecttheme_get_show_price($skk->bid);

            $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##',
            '##user_bid_value##','##winner_bid_username##','##winner_bid_value##');
               $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid),
            $user_bid_value,$winner_bid_username,$winner_bid_value);

            $tag		= 'ProjectTheme_send_email_on_win_to_loser';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($user->user_email, $subject, $message);

        endif;
    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_win_to_owner($pid, $winner_uid) {
        $multilang_subject = _e('The project has been assigned', 'my-email-subject');
        $subject  == $multilang_subjects;

        $post 			= get_post($pid);
        $user 			= get_userdata($post->post_author);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

        $projectTheme_get_winner_bid = projectTheme_get_winner_bid($pid);

        $usrnm = get_userdata($winner_uid);
        $winner_bid_username = $usrnm->user_login;
        $winner_bid_value = projecttheme_get_show_price($projectTheme_get_winner_bid->bid);

        //--------------------------------------------------------------------------

        $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##','##winner_bid_value##','##winner_bid_username##');
        $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid),
        $winner_bid_value,$winner_bid_username );

        $tag		= 'ProjectTheme_send_email_on_win_to_owner';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
          <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                            <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong><?php echo _e("Assignment confirmation"); ?>
                                      <!-- Επιβεβαίωση Ανάθεσης -->
                                        </strong></span></font></h1>
                                </td>
                            </tr>
                        </tbody></table>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <br>
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("You have chosen the offer from user "); ?>
                                    <!-- Έχεις επιλέξει την προσφορά του  -->
                                    <?php echo $winner_bid_username; ?>
                                    <?php echo _e("of value "); ?>
                                     <!-- αξίας -->
                                     <?php echo $winner_bid_value;?>
                                     <?php echo _e("for your project "); ?>
                                     <!-- για το project σου -->
                                     <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?></strong>.
                                    <?php echo _e("The provider"); ?>
                                    <?php echo _e("has been informed that has won and will sortly start working on your Project"); ?>
                                    <!-- έχει ενημερωθεί για την ανάθεση και θα ξεκινήσει άμεσα την ολοκλήρωση του. -->
                                    <br>

                                    <?php echo _e("You can track the progress of your projects at "); ?>
                                    <!-- Μπορείς να παρακολουθείς την πορεία των project σου ανά πάσα στιγμή από  -->
                                    <a href="<?php echo _e("https://www.grey-cell.co.uk/my-account/"); ?>" target="_blank">
                                      <?php echo _e("your account page"); ?></a>.
                                    <br><br>
                                    <?php echo _e("Project info"); ?>
                                    <!-- Πληροφορίες Project: -->
                                </td>
                            </tr>
                        </tbody></table>
                        <!--Project Summary--->
                        <table style="margin-left:30px">
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri() ?>/images/wallet_icon2.png" width="18" height="18" alt="budget" /> <?php echo __("Project Budget",'ProjectTheme'); ?>:</td>
                                    <td> <p><?php echo ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid, 'budgets', true)); ?></p> </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/loc_icon.png" width="18" height="18" alt="location"/><?php echo __("Location",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo get_the_term_list( $pid, 'project_location', '', ', ', '' ); ?></p></td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/cate_icon.png" width="18" height="18" alt="category" /> <?php echo __("Category",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo get_the_term_list( $pid, 'project_cat', '', ', ', '' ); ?></p></td>
                                </tr>
                                <tr>
                                    <?php
                                        $date_posted_unix = get_post_meta($pid,'made_me_date',true);
                                        $date_posted = date_i18n('d-M-Y', $date_posted_unix);
                                    ?>
                                    <td> <img src="<?php echo get_template_directory_uri(); ?>/images/cal_icon.png" width="18" height="18" alt="calendar"/> <?php echo __("Posted on",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo $date_posted ?></p></td>
                                </tr>
                                <tr>
                                    <td><?php echo __("Project Description",'ProjectTheme'); ?>: </td>
                                    <td>
                                        <?php
                                            $content = get_post($pid);
                                            echo $content->post_content;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        <br><br>
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>


        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        //---------------------------------------------

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_on_win_to_bidder($pid, $winner_uid) {
        $multilang_subject = _e('The project has been assigned', 'my-email-subject');
        $subject  == $multilang_subjects;

        $post 			= get_post($pid);
        $user 			= get_userdata($winner_uid);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

        $projectTheme_get_winner_bid = projectTheme_get_winner_bid($pid);
        $usrnm = get_userdata($winner_uid);
        $winner_bid_username = $usrnm->user_login;
        $winner_bid_value = projecttheme_get_show_price($projectTheme_get_winner_bid->bid);

        $find 		= array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##','##winner_bid_value##');
        $replace 	= array($user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid), $winner_bid_value);

        $tag		= 'ProjectTheme_send_email_on_win_to_bidder';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
            <!--*|END:IF|*-->
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">

                                            <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">

                                    <a href="*|ARCHIVE|*" target="_blank"> in your browser</a>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong><?php echo _e("Your bid has been chosen") ?></strong></span></font></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <br>
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                    <br>
                                    <?php echo _e("You have been assigned the project"); ?>
                                    <!-- Σου έχει ανατεθεί το project -->
                                     <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?></strong> για <?php echo $winner_bid_value; ?>.
                                    <br><br>
                                    <?php echo _e("Project Info:"); ?>
                                    <!-- Πληροφορίες Project: -->
                                </td>
                            </tr>
                        </tbody></table>
                            <table style="margin-left:30px">
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri() ?>/images/wallet_icon2.png" width="18" height="18" alt="budget" /> <?php echo __("Project Budget",'ProjectTheme'); ?>:</td>
                                    <td> <p><?php echo ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid, 'budgets', true)); ?></p> </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/loc_icon.png" width="18" height="18" alt="location"/><?php echo __("Location",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo get_the_term_list( $pid, 'project_location', '', ', ', '' ); ?></p></td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/cate_icon.png" width="18" height="18" alt="category" /> <?php echo __("Category",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo get_the_term_list( $pid, 'project_cat', '', ', ', '' ); ?></p></td>
                                </tr>
                                <tr>
                                    <?php
                                        $date_posted_unix = get_post_meta($pid,'made_me_date',true);
                                        $date_posted = date_i18n('d-M-Y', $date_posted_unix);
                                    ?>
                                    <td> <img src="<?php echo get_template_directory_uri(); ?>/images/cal_icon.png" width="18" height="18" alt="calendar"/> <?php echo __("Posted on",'ProjectTheme'); ?>:</td>
                                    <td><p><?php echo $date_posted ?></p></td>
                                </tr>
                                <tr>
                                    <td><?php echo __("Project Description",'ProjectTheme'); ?>: </td>
                                    <td>
                                        <?php
                                            $content = get_post($pid);
                                            echo $content->post_content;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        <!--End of Project Summary-->
                        <br><br>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody>
                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                              </td>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>

                                    <tr>
                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        //--------------------------------------

        ProjectTheme_send_email($user->user_email, $subject, $mail_message);

    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_when_bid_project_bidder($pid, $uid, $bid) {
        $multilang_subject = _e('Your bid for the project', 'my-email-subject');
        $subject  == $multilang_subjects;

        $post 			= get_post($pid);
        $user 			= get_userdata($uid);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
        $bid_val		= ProjectTheme_get_show_price($bid);

        $find 		= array('##project_name##');
        $replace 	= array(htmlspecialchars_decode($post->post_title, ENT_NOQUOTES));

        //Mail Message
        ob_start();
        ?>

        <!doctype html>
            <?php header_get_mail(); ?>
                <body>
                    <!--*|IF:MC_PREVIEW_TEXT|*-->
                    <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
                    <!--*|END:IF|*-->
                    <center>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                            <tr>
                                <td align="center" valign="top" id="bodyCell">
                                    <!-- BEGIN TEMPLATE // -->
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                        <tr>
                                            <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                <tbody class="mcnImageBlockOuter">
                        <tr>
                            <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                    <tbody><tr>
                                        <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                                    <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h1 class="null" style="text-align: center;"><font face="open sans, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:48px"><strong><?php echo _e("Your bid"); ?>
                                            </strong></span></font></h1>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <br>
                                        <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                        <br>
                                        <?php echo _e("Your bid for"); ?><strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES);?></strong> <?php echo _e("with value"); ?> <?php echo $bid_val;?> <?php echo _e("has reached the contractor"); ?>.
                                        <br><br>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                    <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                    <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                    <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                  </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                <tbody class="mcnDividerBlockOuter">
                    <tr>
                        <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                                <tbody><tr>
                                    <td>
                                        <span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php footer_get_mail(); ?>

        <?php
        $message = ob_get_contents();
        ob_end_clean();

        //End of mail message

        //---------------------------------------------

        $tag		= 'ProjectTheme_send_email_when_bid_project_bidder';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        ProjectTheme_send_email($user->user_email, $subject, $message);
    }

    #THIS!!! GOOD
    function ProjectTheme_send_email_when_bid_project_owner($pid, $uid, $bid) {
        $multilang_subject = _e('New bid for the project', 'my-email-subject');
        $subject  == $multilang_subjects;

        $bidder 		= get_userdata($uid);
        $post 			= get_post($pid);
        $user 			= get_userdata($post->post_author);
        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
        $bid_val		= ProjectTheme_get_show_price($bid);
        $bidder_username = $bidder->user_login;
        $author			= get_userdata($post->post_author);


        $find 		= array('##username##', '##bid_value##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##', '##bidder_username##');
        $replace 	= array($user->user_login, $bid_val, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($post->post_title, ENT_NOQUOTES), get_permalink($pid), $bidder_username);

        $tag		= 'ProjectTheme_send_email_when_bid_project_owner';
        $find 		= apply_filters( $tag . '_find', 	$find );
        $replace 	= apply_filters( $tag . '_replace', $replace );

        ob_start();
        ?>
        <?php header_get_mail(); ?>

        <body>
            <!--*|IF:MC_PREVIEW_TEXT|*-->
            <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
            <!--*|END:IF|*-->
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                            <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">

                                <a href="*|ARCHIVE|*" target="_blank"> in your browser</a>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong><?php echo _e("New bid"); ?></strong></span></span></h1>

                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <br>
                                <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                <br>
                                <?php echo _e("Your project"); ?>
                                <!-- Το Project σου -->
                                 <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>
                                 <?php echo _e("has a new offer from "); ?>
                                  <!-- έχει μια νέα προσφορά από τον -->
                                  <strong><?php echo $bidder_username; ?></strong>
                                  <?php echo _e("for"); ?>
                                <strong><?php echo $bid_val; ?></strong>. <br>
                                <?php echo _e("See it "); ?><a href="<?php echo get_permalink($pid); ?>" target="_blank"><?php echo _e("here"); ?></a>.
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                          <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                            <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                            <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                            <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                          </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
            <tr>
                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                    <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------

        ProjectTheme_send_email($author->user_email, $subject, $mail_message);

    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_when_on_completed_project($pid, $uid, $bid) {
        $enable 	= get_option('Payment completed');
        $multilang_subject = _e('ProjectTheme_payment_on_completed_project_subject', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_payment_on_completed_project_message');


        if($enable != "no"):

            $bidder 		= get_userdata($uid);
            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
            $bid_val		= ProjectTheme_get_show_price($bid);
            $bidder_username = $bidder->user_login;
            $author			= get_userdata($post->post_author);


            $find 		= array('##username##', '##bid_value##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##', '##bidder_username##');
               $replace 	= array($user->user_login, $bid_val, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid), $bidder_username);

            $tag		= 'ProjectTheme_send_email_when_on_completed_project';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($author->user_email, $subject, $message);

        endif;
    }
    #THIS!!! ADMIN

    #THIS!!! GOOD
    function ProjectTheme_send_email_posted_project_not_approved($pid) {
        $multilang_subject = _e('Posted project not approved', 'my-email-subject');
        $subject  == $multilang_subjects;
        $opt = get_post_meta($pid,'ProjectTheme_send_email_posted_project_not_approved', true);

        if(empty($opt)):

            update_post_meta($pid,'ProjectTheme_send_email_posted_project_not_approved', '1');
            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
            $project_name 	= $post->post_title;
            $term_title = get_the_term_list( $pid, 'project_cat', '', ', ', '' );

            $find 		= array('##category##','##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
               $replace 	= array( htmlspecialchars_decode(strip_tags($term_title), ENT_NOQUOTES),$user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($project_name, ENT_NOQUOTES), get_permalink($pid));

            $tag		= 'ProjectTheme_send_email_posted_project_not_approved';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            //Mail Message

            ob_start();
            ?>
                <?php header_get_mail(); ?>
                <body>
            <!--*|IF:MC_PREVIEW_TEXT|*-->
            <!--[if !gte mso 9]>--><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
            <!--*|END:IF|*-->
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <!-- BEGIN TEMPLATE // -->
                            <!--[if (gte mso 9)|(IE)]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                            <tr>
                            <td align="center" valign="top" width="600" style="width:600px;">
                            <![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                            <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong><?php echo _e("Your project has been published"); ?></strong></span></span></h1>

                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php  echo $user->user_login;?>,<br>
                                <br>
                                <?php echo _e("We have received your project "); ?>
                                <!-- Έχουμε λάβει με επιτυχία το Project σου  -->
                                <strong><?php echo htmlspecialchars_decode($project_name, ENT_NOQUOTES); ?></strong>
                                <?php echo _e("in category "); ?>
                                 <!-- στην κατηγορία -->
                                 <strong><?php echo htmlspecialchars_decode(strip_tags($term_title), ENT_NOQUOTES); ?></strong>
                                 <?php echo _e("and will soon be approved by our administrators!"); ?>
                                <!-- και σύντομα θα δημοσιευθεί αφού εγκριθεί από τους διαχειριστές! -->
                                <br>
                                <br>
                                <?php echo _e("You will be informed will a new message when the process is completed."); ?>
                                <!-- Θα ειδοποιηθείς με ένα νέο μήνυμα όταν η διαδικασία ολοκληρωθεί. -->
                              </span><br> 
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                          <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                            <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                            <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                            <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                          </td>
                        </tr>
                    </tbody>
                  </table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
            <tr>
                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                    <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>
            <?php footer_get_mail(); ?>
            <?php
            $mail_message = ob_get_contents();
            ob_end_clean();

            //End of Mail Message

            $email = $user->user_email;
            ProjectTheme_send_email($email, $subject, $mail_message);

        endif;

    }
    add_theme_support( "title-tag" );

    #THIS!!! GOOD
    function ProjectTheme_send_email_posted_project_approved($pid) {
        $multilang_subject = _e('Approved & published', 'my-email-subject');
        $subject  == $multilang_subjects;
        $opt = get_post_meta($pid,'ProjectTheme_send_email_posted_project_approved', true);

        if(empty($opt)):

            update_post_meta($pid,'ProjectTheme_send_email_posted_project_approved', '1');

            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_bloginfo('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

            $post 		= get_post($pid);
            $project_name 	= $post->post_title;
            $project_link 	= get_permalink($pid);
            $term_title = get_the_term_list( $pid, 'project_cat', '', ', ', '' );

            $find 		= array('##category##','##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
               $replace 	= array(htmlspecialchars_decode(strip_tags($term_title), ENT_NOQUOTES),$user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, htmlspecialchars_decode($project_name, ENT_NOQUOTES), $project_link);

            //Mail Message

            ob_start();
            ?>
            <?php header_get_mail();?>
        <body>
            <!--*|IF:MC_PREVIEW_TEXT|*-->
            <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
            <!--*|END:IF|*-->
            <center>
                <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top" id="bodyCell">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                <tr>
                                    <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
                <tr>
                    <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                            <tbody><tr>
                                <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                            <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <h1 class="null" style="text-align: center;"><span style="font-size:36px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong>
                                  <?php echo _e("Approved and published"); ?></strong></span></span></h1>

                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                            <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                <br>
                                <?php echo _e("Your project "); ?>
                                <!-- To Project σου  -->
                                <strong><?php echo htmlspecialchars_decode($project_name, ENT_NOQUOTES); ?></strong>
                                <?php echo _e("has been approved by our administrators and in now published in category "); ?>
                                 <!-- εγκρίθηκε από τους διαχειριστές μας και έχει δημοσιευθεί στην κατηγορία  -->
                                 <strong><?php echo htmlspecialchars_decode(strip_tags($term_title), ENT_NOQUOTES); ?></strong>.
                                 <?php echo _e("Soon you will receive your first bids!"); ?>
                                <!-- Πολύ σύντομα θα λάβεις και τις πρώτες προσφορές! -->
                                <br>
                                <?php echo _e("You can see your projects and their state"); ?>
                                <!-- Μπορείς να δεις τα Project σου και την καταστασή τους -->
                                <a href="<?php echo _e("https://www.grey-cell.co.uk/my-account/") ?>" target="_blank">
                                  <?php echo _e("at your account"); ?>
                                  <!-- στο λογαριασμό σου -->
                                </a>.<br>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            </tr>
        </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
            <tr>
                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>

                          <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                            <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                            <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                            <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                          </td>
                        </tr>
                    </tbody>
                  </table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
            <tr>
                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                    <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>
            <?php footer_get_mail(); ?>
            <?php
            $mail_message = ob_get_contents();
            ob_end_clean();

            //End of Mail Message

            $tag		= 'ProjectTheme_send_email_posted_project_approved';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            $email = $user->user_email;
            ProjectTheme_send_email($email, $subject, $mail_message);

        endif;

    }
    #THIS!!! NOT USED
    function projectTheme_send_email_to_project_payer($pid, $payer_user_id, $receiver_user_id, $amount, $pay_by_credits = '0') {
        $paid_user = get_post_meta($pid, 'paid_user',true);

        if($paid_user == "0") :

        $post 			= get_post($pid);
        $payer_user 	= get_userdata($payer_user_id);
        $datemade 		= current_time('timestamp',0);
        $perm 			= get_permalink($pid);
        $receiver_user 	= get_userdata($receiver_user_id);

        //-----------

        update_post_meta($pid, 'paid_user',"1");
        update_post_meta($pid, "paid_user_date", $datemade);
        $receiver_user_id = get_post_meta($pid, 'winner', true);

        //-----------

        $subject = sprintf(__("Your payment was completed for the project: %s",'ProjectTheme'), $post->post_title);
        $message = sprintf(__('You have paid for the project <a href="%s">%s</a> the amount of: %s %s to user:
        <b>%s</b>',"ProjectTheme"),$perm,$post->post_title,$amount,$cure,$receiver_user->user_login) ;

        //sitemile_send_email($receiver_user->user_email, $subject , $message); // send email for the payment received


        $subject = sprintf(__("Details for closed Project: %s",'ProjectTheme'), $post->post_title);
        $message = sprintf(__('The project <a href="%s">%s</a> was just closed. Here is the user email for the other party: %s',"ProjectTheme"),
        $perm,$post->post_title,$payer_user->user_email) ;

        //sitemile_send_email($receiver_user->user_email, $subject , $message); // send email for the details

        //------------

        $subject = sprintf(__("Your have received payment for the project: %s",'ProjectTheme'), $post->post_title);
        $message = sprintf(__('You have been just paid for the project <a href="%s">%s</a> the amount of: %s %s from user:
        <b>%s</b>',"ProjectTheme"),$perm,$post->post_title,$amount,$cure, $payer_user->user_login) ;

        //sitemile_send_email($payer_user->user_email, $subject , $message); // send email for the payment received

        $subject = sprintf(__("Details for closed Project: %s",'ProjectTheme'), $post->post_title);
        $message = sprintf(__('The project <a href="%s">%s</a> was just closed. Here is the user email for the other party: %s',"ProjectTheme"),
        $perm,$post->post_title,$receiver_user->user_email) ;

        //sitemile_send_email($payer_user->user_email, $subject , $message); // send email for the details

        //------------

        if($pay_by_credits == '1'):

            $cr = projectTheme_get_credits($payer_user_id);
            projectTheme_update_credits($payer_user_id, $cr - $amount);

            $uprof 	= ProjectTheme_get_user_profile_link($receiver_user->ID); //home_url()."/user-profile/".$receiver_user->user_login;
            $reason = sprintf(__('Payment sent to <a href="%s">%s</a> for project <a href="%s">%s</a>','ProjectTheme'),$uprof, $receiver_user->user_login , $perm,
            $post->post_title);
            projectTheme_add_history_log('0', $reason, $amount, $payer_user_id, $receiver_user_id);

            //=========================

            $projectTheme_fee_after_paid = get_option('projectTheme_fee_after_paid');
            if(!empty($projectTheme_fee_after_paid)):

                $deducted = $amount*($projectTheme_fee_after_paid * 0.01);
            else:

                $deducted = 0;

            endif;

            $cr = projectTheme_get_credits($receiver_user_id);
            projectTheme_update_credits($receiver_user_id, $cr + $amount - $deducted);

            $uprof 	= ProjectTheme_get_user_profile_link($payer_user_id->ID);
            $reason = sprintf(__('Payment received from <a href="%s">%s</a> for project <a href="%s">%s</a>','ProjectTheme'),$uprof, $payer_user_id->user_login , $perm,
            $post->post_title);
            projectTheme_add_history_log('1', $reason, $amount , $receiver_user_id, $payer_user_id);

            //--------

            $reason = sprintf(__('Payment fee for project <a href="%s">%s</a>','ProjectTheme'), $perm, $post->post_title);
            projectTheme_add_history_log('0', $reason, $deducted, $receiver_user_id);


        endif;endif;

        //------------
    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_escrow_project_to_owner2($pid, $es) {
        $enable 	= get_option('ProjectTheme_escrow_project_owner_email_enable');
        $multilang_subject = _e('Escrow Sent', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_escrow_project_owner_email_message');

        if($enable != "no"):

            $es = projecttheme_get_show_price($es);
            $post 			= get_post($pid);
            $user 			= get_userdata($post->post_author);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_option('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


            $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##','##escrow_amount##');
               $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid), $es);

            $tag		= 'ProjectTheme_send_email_on_escrow_project_to_owner2';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($user->user_email, $subject, $message);

        endif;
    }
    #THIS!!! NOT USED
    function ProjectTheme_send_email_on_escrow_project_to_bidder($pid, $bidder_id, $es) {
        $enable 	= get_option('ProjectTheme_escrow_project_bidder_email_enable');
        $multilang_subject = _e('Escrow Received', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_escrow_project_bidder_email_message');

        if($enable != "no"):

            $es = projecttheme_get_show_price($es);
            $post 			= get_post($pid);
            $user 			= get_userdata($bidder_id);
            $site_login_url = ProjectTheme_login_url();
            $site_name 		= get_option('name');
            $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));


            $find 		= array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##', '##escrow_amount##');
               $replace 	= array($user->user_login, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid), $es);

            $tag		= 'ProjectTheme_send_email_on_escrow_project_to_bidder';
            $find 		= apply_filters( $tag . '_find', 	$find );
            $replace 	= apply_filters( $tag . '_replace', $replace );

            $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
            $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

            //---------------------------------------------

            ProjectTheme_send_email($user->user_email, $subject, $message);

        endif;
    }
    #THIS!!! GOOD
    function ProjectTheme_send_email_subscription($pid) {
        $opt = get_post_meta($pid,'subscription_email_senta',true);

        if(empty($opt)) {

            $cat_qw		= '( 0=1 ';
            $cat 		= wp_get_object_terms($pid, 'project_cat');

            foreach($cat as $cc)
            $cat_qw .= " or cats.catid='".$cc->term_id."' ";
            $cat_qw .= ')';

            //------------------------

            $loc_qw		= '( 0=1 ';
            $loc 		= wp_get_object_terms($pid, 'project_location');

            foreach($loc as $cc)
            $loc_qw .= " or locsa.catid='".$cc->term_id."' ";
            $loc_qw .= ')';

            //------------------------



            global $wpdb;

            $post 	= get_post($pid);
            // Query for the categories
            // $s = "select distinct cats.uid from " .$wpdb->prefix. "greysell_project_email_alerts cats where " .$cat_qw;
            $s 	= "select distinct cats.uid from ".$wpdb->prefix."project_email_alerts cats where ".$cat_qw;

            // Query for the locations (not used, same procedure as Categories must be followed )
            $s1 = "select distinct locsa.uid from greysell_test.greysell_project_email_alerts_locs locsa where $loc_qw";
            $ProjectTheme_enable_project_location = get_option('ProjectTheme_enable_project_location');
            if($ProjectTheme_enable_project_location == "no")
            {
                $s = "select distinct cats.uid from ".$wpdb->prefix."project_email_alerts cats where $cat_qw ";
            }



            $r 	= $wpdb->get_results($s);


            foreach($r as $row):


                $enable 	= get_option('ProjectTheme_subscription_email_enable');
                $multilang_subject = _e('New project in your category', 'my-email-subject');
                $subject  == $multilang_subjects;
                $message 	= get_option('ProjectTheme_subscription_email_message');

                if($enable != "no"):

                    $user 			= get_userdata($row->uid);
                    $site_login_url = ProjectTheme_login_url();
                    $site_name 		= get_bloginfo('name');
                    $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));
                    $term_title     = get_the_term_list( $pid, 'project_cat', '', ', ', '' );

                    $find 		= array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##project_name##', '##project_link##');
                    $replace 	= array($user->user_login, $user->user_email, $site_login_url, $site_name, home_url(), $account_url, $post->post_title, get_permalink($pid));

                    $tag		= 'ProjectTheme_subscription_email';
                    $find 		= apply_filters( $tag . '_find', 	$find );
                    $replace 	= apply_filters( $tag . '_replace', $replace );

                    //$message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
                    $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

                    // Mail Message

                    ob_start(); ?>
                    <?php header_get_mail(); ?>
                            <body>
                              <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
                                <center>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                                        <tr>
                                            <td align="center" valign="top" id="bodyCell">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                                    <tr>
                                                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                            <tbody class="mcnImageBlockOuter">
                                    <tr>
                                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                                <tbody><tr>
                                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                                                <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                            </tbody>
                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                            <tbody><tr>

                                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                                    <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong>Νέο Project</strong></span></span></h1>

                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                            <tbody><tr>

                                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                                    <br>
                                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user->user_login; ?>,<br>
                                                    <br>
                                                    <?php echo _e("A new project "); ?>
                                                    <!-- Ένα νέο Project -->
                                                    <strong><?php echo htmlspecialchars_decode($post->post_title, ENT_NOQUOTES); ?></strong>
                                                    <?php echo _e("in category "); ?>
                                                     <!-- στην κατηγορία  -->
                                                     <strong><?php echo htmlspecialchars_decode(strip_tags($term_title), ENT_NOQUOTES); ?></strong>
                                                     <?php echo _e(" has just been published"); ?>
                                                      <!-- μόλις ανέβηκε. -->
                                                    </span><br>
                                                    <br>
                                                    <?php echo _e("Take a look at it and make a bid"); ?>
                                                    <!-- Δες το και στείλε προσφορά  -->
                                                    <a href="https://www.grey-cell.co.uk/my-account/" target="_blank"><?php echo _e("here"); ?></a>.
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                            <tbody><tr>

                                              <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                                <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                                <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                                <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                                <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                              </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody>
                        </table> </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                            <tbody class="mcnDividerBlockOuter">
                                <tr>
                                    <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                                            <tbody><tr>
                                                <td>
                                                    <span></span>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    <?php footer_get_mail(); ?>
                    <?php
                    // End Of Mail Message

                    $message = ob_get_contents();
                    ob_end_clean();

                    //---------------------------------------------

                    $email = get_bloginfo('admin_email');
                    ProjectTheme_send_email($user->user_email, $subject, $message);

                    endif;

            endforeach;

            update_post_meta($pid,'subscription_email_senta',"111a");

        }
    }

    #THIS!!! GOOD
    function ProjectTheme_new_user_notification($user_id, $plaintext_pass = '') {
        $user = new WP_User($user_id);

        $multilang_subject = _e('Welcome to GreyCell - We are activating your account', 'my-email-subject');
        // Καλώς ήλθες στη GreySell - Ενεργοποίησε το λογαριασμό σου
        $subject  == $multilang_subjects;

        $user_login = stripslashes($user->user_login);
        $user_email = stripslashes($user->user_email);

        $user_info = get_userdata($user_id);
        // create md5 code to verify later
        $code = md5(time());
        // make it into a code to send it to user via email
        $string = array('id'=>$user_id, 'code'=>$code);
        // create the activation code and activation status
        update_user_meta($user_id, 'account_activated', 0);
        update_user_meta($user_id, 'activation_code', $code);
        // create the url
        $confirmation_url = get_site_url(). '/thank-you/?act=' .base64_encode( serialize($string));

        //Mail Message
        ob_start();
        ?>
            <?php header_get_mail(); ?>
        <body>
            <!--*|IF:MC_PREVIEW_TEXT|*-->
            <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
            <center>
              <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                  <td align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                      <tr>
                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                          <tbody class="mcnImageBlockOuter">
                            <tr>
                              <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                  <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                      <img align="center" alt="" src="https://www.grey-cell.co.uk/wp-content/uploads/2019/09/New_Logo_website.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                        </tbody>
                      </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                        <tbody class="mcnTextBlockOuter">
                          <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            </td>
                          </tr>
                        </tbody>
                      </table></td>
                    </tr>
                    <tr>
                      <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                        <tbody class="mcnTextBlockOuter">
                          <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <h1 class="null" style="text-align: center;"><span style="font-size:48px"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><strong><?php echo _e("Welcome to GreyCell"); ?></strong></span></span></h1>
                                  </td>
                                </tr>
                              </tbody></table>
                            </td>
                          </tr>
                        </tbody>
                      </table></td>
                    </tr>
                    <tr>
                      <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                        <tbody class="mcnTextBlockOuter">
                          <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>
                                  <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user_login;?>, <br>
                                      <?php echo _e("Thank you for your registration in GreyCell. You password is: "); ?>
                                      <!-- Σ' ευχαριστούμε για την εγγραφή σου στη GreyCell. Ο κωδικός σου είναι:  -->
                                      <?php echo $plaintext_pass; ?>
                                      <br>
                                      <?php echo _e("At this step you should validate your account "); ?>
                                      <!-- Σε αυτό το σημείο θα χρειαστεί να επιβεβαιώσεις το λογαριασμό σου. -->
                                    </span>
                                    </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
                          <tbody class="mcnButtonBlockOuter">
                            <tr>
                              <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
                                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 19px;background-color: #82BDD4;">
                                  <tbody>
                                    <tr>
                                      <td align="center" valign="middle" class="mcnButtonContent" style="font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; padding: 15px;">
                                        <a class="mcnButton " title="Επιβεβαίωση" href="<?php echo $confirmation_url; ?>" target="_blank" style="font-weight: bold;letter-spacing: 0px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Επιβεβαίωση</a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                          <tbody class="mcnTextBlockOuter">
                            <tr>
                              <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                  <tbody>
                                    <tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <?php echo _e("After that you can edit your profile "); ?>
                                        <!-- Στη συνέχεια μπορείς να συμπληρώσεις το προφίλ σου από τις  -->
                                        <a href="<?php echo _e("https://grey-cell.co.uk/my-account/personal-information/"); ?>" target="_blank"><?php echo _e("here"); ?></a>.
                                        <?php echo _e("And also change your password"); ?>
                                        <!-- Εκεί μπορείς να αλλάξεις και τον κωδικό σου. -->
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody>
                          </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                            <tbody class="mcnTextBlockOuter">
                              <tr>
                                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                  <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>
                                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                        <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                                        <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                                        <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                                        <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody>
                          </table></td>
                        </tr>
                        <tr>
                          <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                            <tbody class="mcnDividerBlockOuter">
                              <tr>
                                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                                  <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                                    <tbody><tr>
                                      <td>
                                        <span></span>
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <?php footer_get_mail(); ?>
                          <?php
                          $mail_message = ob_get_contents();
                          ob_end_clean();
                          //End of Mail Message
                          //ProjectTheme_send_email($user_email, $subject, $mail_message);
                        }

    #THIS!!! GOOD
    function ProjectTheme_new_user_how_it_works_notification($user_id) {

        $multilang_subject = _e('Welcome to GreyCell - How it works', 'my-email-subject');
        // Καλώς ήλθες στη GreySell - Πώς Λειτουργεί
        $subject  == $multilang_subjects;
        $user = get_userdata($user_id);
        $user_email = stripslashes($user->user_email);
        $user_login = stripslashes($user->user_login);

        //Mail Message

            // Mail Message if the User is Provider
            if(ProjectTheme_is_user_provider($user_id)) {
                ob_start(); ?>
                <?php header_get_mail(); ?>
                <body><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
                    <!--*|END:IF|*-->
                    <center>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                            <tr>
                                <td align="center" valign="top" id="bodyCell">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                        <tr>
                                            <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                <tbody class="mcnImageBlockOuter">
                        <tr>
                            <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                    <tbody><tr>
                                        <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                    <img align="center" alt="" src="https://gallery.mailchimp.com/e74121e3c976d77357eb0ccab/images/b4e7e26e-0a57-4405-9ec2-d1f0afc4afd9.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong><?php echo _e("Welcome!"); ?></strong></span></span></h1>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <br>
                                    <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user_login;?>,</span><br>
                                    <br>
                                    Welcome on board!
                                    <?php echo _e("Here is a tutorial on how to make your bids quickly and easy! "); ?>
                                      <!-- Φτιαξαμε έναν μικρό οδηγό για να ξεκινήσεις να στέλνεις πρόσφορές εύκολα και γρήγορα, δες παρακάτω. -->
                                      <br>
                                    &nbsp;
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                <tbody class="mcnDividerBlockOuter">
                    <tr>
                        <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                <tbody><tr>
                                    <td>
                                        <span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h2 style="text-align: center;">
                                          <?php echo _e("What is the workspace?"); ?>
                                          <!-- Τι είναι το Workspace; -->
                                        </h2>
                                        <p>
                                          <?php echo _e("The workspace is the place where every contractor or bussiness can edit it's projects, make bids and track the status of the assigned projects. "); ?>
                                          <!-- Το Workspace της GreyCell είναι το μέρος που κάθε ελεύθερος επαγγελματίας ή επιχείρηση μπορεί να διαχειρίζεται Projects, να στέλνει προσφορές και να παρακολουθεί την κατασταση των Projects που έχει αναλάβει. -->
                                        </p>
                                    </td>
                                </tr>
                            </tbody></table>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                <tbody class="mcnDividerBlockOuter">
                    <tr>
                        <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                <tbody><tr>
                                    <td>
                                        <span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h1 style="text-align: center;"><strong>
                                          <?php echo _e("Step 1"); ?>
                                          <!-- Βήμα 1 -->
                                        </strong></h1>

            <p style="text-align: center;"><strong>
              <?php echo _e("Search Projects"); ?>
              <!-- Αναζήτησε Projects -->
            </strong></p>

            <ul>
                <li>
                <p>
                  <?php echo _e("Clikc on 'Search Projects', and search in project categories for projects you want to work on"); ?>
                  <!-- Κλίκαρε στο ‘Aναζήτηση Projects’, και ψάξε στις κατηγορίες που σε ενδιαφέρουν για τα Projects που θες να αναλάβεις. -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("Once you find a project that interests you, open it to see more info. You can contact the user if you need more info through the messages."); ?>
                  <!-- Μόλις βρεις το Project που σε ενδιαφέρει, άνοιξε το για να δεις περισσότερες πληροφορίες. Μπορείς να επικοινωνήσεις με τον χρήστη αν χρειάζεσαι περισσότερες πληροφορίες μέσω της εφαρμογής ανταλλαγής μηνυμάτων. -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("When you are ready, fill in your offer and click send. The user who has posted the project will be notified for your bid."); ?>
                  <!-- Όταν είσαι έτοιμος, συμπλήρωσε προσεκτικά την προσφορά σου και κλίκαρε αποστολή. Ο χρήστης που έχει ανεβάσει το Project θα είδοποιηθέι άμεσα για την προσφορά σου. -->
                </p>
                </li>
            </ul>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                <tbody class="mcnImageCardBlockOuter">
                    <tr>
                        <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

            <table align="right" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                <tbody><tr>
                    <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">
                        <a href="https://youtu.be/NGZKpFHV9cM" title="Αναζήτηση Projects και Αποστολή Προσφοράς" class="" target="_blank">
                        <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/dd5ee30f93c78fcc36eafa58bdbdaf5a.png" width="564" style="max-width:640px;" class="mcnImage">
                        </a>
                    </td>
                </tr>
            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                <tbody class="mcnDividerBlockOuter">
                    <tr>
                        <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                <tbody><tr>
                                    <td>
                                        <span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h1 style="text-align: center;"><strong>
                                          <?php echo _e("Step 3"); ?>
                                          <!-- Βήμα 2 -->
                                        </strong></h1>

            <p style="text-align: center;"><strong>
              <?php echo _e("Build trust"); ?>
              <!-- Χτίσε εμπιστοσύνη -->
            </strong></p>

            <ul>
                <li>
                <p>
                  <?php echo _e("The user who uploaded the project, would propably like to know more about you ,before assigning it to you. An updated and complete profile would make a great first impression"); ?>
                  <!-- Ο παραγγελιοδότης (ο χρήστης που ανέβασε το Project), πιθανώς ενδιαφέρεται να μάθει περισσότερα για εσένα πριν σου το αναθέσει. Ένα ενημερωμένο και πλήρες προφίλ είναι η καλύτερη πρώτη εντύπωση. -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("You can include in your profile examples of your past projects, and links from your websites of porfolios"); ?>
                  <!-- Μπορείς να συμπεριλάβεις στο προφίλ σου παραδείγματα από προηγούμενες δουλειές σου, και links από προσωπικά websites ή portfolios. -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("If your offer is accepted, you will be informed instantly"); ?>
                  <!-- Εάν επιλεγεί η προσφορά σου, θα ενημερωθείς άμεσα πως σου έχει ανατεθεί το Project. -->
                </p>
                </li>
            </ul>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                <tbody class="mcnImageCardBlockOuter">
                    <tr>
                        <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                <tbody><tr>
                    <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">
                        <a href="https://youtu.be/iDQB7BN5X5Y" title="Ενημέρωση και Ρυθμίσεις Λογαριασμού" class="" target="_blank">
                        <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/331585afd22dc74b6ad471374887c0e2.png" width="564" style="max-width:640px;" class="mcnImage">
                        </a>
                    </td>
                </tr>
            </tbody></table>

                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                <tbody class="mcnDividerBlockOuter">
                    <tr>
                        <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                            <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                <tbody><tr>
                                    <td>
                                        <span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                <tbody><tr>

                                    <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                        <h1 style="text-align: center;"><strong>
                                          <?php echo _e("Step 3"); ?>
                                          <!-- Βήμα 3 -->
                                        </strong></h1>

            <p style="text-align: center;"><strong>
              <?php echo _e("Show your best!"); ?>
              <!-- Δείξε τον καλύτερό σου εαυτό! -->
            </strong></p>

            <ul>
                <li>
                <p>
                  <?php echo _e("Since you have been assigned the project, it is now time to show your work!"); ?>
                  <!-- Αφού πήρες το Project, ήρθε η ώρα για να δείξεις την δουλειά σου! -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("Don't forget to inform your contractor about the progress of the project"); ?>
                  <!-- Μην ξεχάσεις να ενημερώνεις τον παραγγελιοδότη για την πορεία των εργασιών, εάν αυτό χρειάζεται. -->
                </p>
                </li>
                <li>
                <p>
                  <?php echo _e("When the project is completed, rate your cooporation with the user"); ?>
                  <!-- Μετά την ολοκλήρωση και παράδοση του Project, αξιολόγησε την συνεργασία σου με τον χρήστη -->
                </p>
                </li>
            </ul>

                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                <tbody class="mcnImageCardBlockOuter">
                    <tr>
                        <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

            <table align="right" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                <tbody><tr>
                    <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">
                        <a href="https://youtu.be/H_os8poXZZI" title="Παράδοση Project" class="" target="_blank">
                        <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/9eb88e1d85c8ea8ac6c8dd879b99a8f7.png" width="564" style="max-width:640px;" class="mcnImage">
                        </a>
                    </td>
                </tr>
            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                <tbody class="mcnTextBlockOuter">
                    <tr>
                        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>
                          <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                            <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                            <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                            <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                          </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
            <tr>
                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                    <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table> <?php

            }
            // Mail Message if User is Contractor
            else {
                ob_start(); ?>
                <?php header_get_mail(); ?>

                <body>
                  <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span>
                        <center>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                                <tr>
                                    <td align="center" valign="top" id="bodyCell">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                            <tr>
                                                <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                    <tbody class="mcnImageBlockOuter">
                            <tr>
                                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                        <tbody><tr>
                                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">


                                                        <img align="center" alt="" src="https://gallery.mailchimp.com/e74121e3c976d77357eb0ccab/images/b4e7e26e-0a57-4405-9ec2-d1f0afc4afd9.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">


                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                    </tbody>
                </table></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong><?php echo _e("Welcome!"); ?></strong></span></span></h1>

                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <br>
                <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user_login;?>,</span><br>
                <br>
                Welcome on board! <?php echo _e("Here is a tutorial on how to post your projects quickly and easy! "); ?>
                 <!-- Φτιάξαμε έναν μικρό οδηγό για να ανεβάσεις το project σου εύκολα και γρήγορα, δες παρακάτω. -->
                 <br>
                &nbsp;
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                    <tbody class="mcnDividerBlockOuter">
                        <tr>
                            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                    <tbody><tr>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <h2 style="text-align: center;">
                                              <?php echo _e("How projects work"); ?>
                                              <!-- Πως λειτουργουν τα Projects -->
                                            </h2>

                <p>
                  <?php echo _e("Wether you have your own company, or you 're just looking for a job from home, 'Projects' is the right place for you. Here you can post Projects, monitor your bids and assignments. Save time and money, to focus on what really matters for you"); ?>
                  <!-- Είτε έχεις τη δική σου εταιρεία, είτε απλά ψάχνεις νέες λύσεις στη δουλειά ή το σπίτι, τα ‘Projects’ είναι ο χώρος σου. Εδώ μπορείς να ανεβάσεις Projects, να παρακολουθείς τις προσφορές και τις αναθέσεις σου. Εξοικονόμησε χρόνο και χρήματα, για να μπορείς να επικεντρωθείς σε αυτό που έχει σημασία για εσένα. -->
                </p>

                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                    <tbody class="mcnDividerBlockOuter">
                        <tr>
                            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                    <tbody><tr>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <h1 style="text-align: center;"><strong><?php echo _e("Step 1"); ?></strong></h1>

                <p style="text-align: center;"><strong>
                  <?php echo _e("Post your Project"); ?>
                  <!-- Πρόσθεσε το Project σου -->
                </strong></p>

                <ul>
                    <li>
                    <p>
                      <?php echo _e("Go to 'New Project'. You will see the submission form."); ?>
                      <!-- Πήγαινε στην επιλογή Νέο Project. Θα ανοίξει η μια νέα φόρμα καταχώρησης. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("Fill in the details of your project, such as Category, Title and Description"); ?>
                      <!-- Συμπλήρωσε τις λεπτομέρειες του Project σου, όπως Κατηγορία, Τίτλος και Περιγραφή. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("Post it when you are ready! The project will be published when it is approved by the administrators."); ?>
                      <!-- Επίλεξε Ολοκλήρωση και είσαι έτοιμος! Το Project σου θα ανέβει στην αντίστοιχη κατηγορία αφού εγκριθεί από τους διαχειριστές μας. -->
                    </p>
                    </li>
                </ul>

                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                    <tbody class="mcnImageCardBlockOuter">
                        <tr>
                            <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                <table align="right" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                    <tbody><tr>
                        <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">


                            <a href="https://youtu.be/GeHoCBFOH8U" title="Προσθήκη Νέου Project" class="" target="_blank">


                            <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/7eb9672d57e49f1771b0a8a2a4a84a46.png" width="564" style="max-width:640px;" class="mcnImage">
                            </a>
                        </td>
                    </tr>
                </tbody></table>

                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                    <tbody class="mcnDividerBlockOuter">
                        <tr>
                            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                    <tbody><tr>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <h1 style="text-align: center;"><strong><?php echo _e("Step 2"); ?></strong></h1>

                <p style="text-align: center;"><strong>
                  <?php echo _e("Choose from the best"); ?>
                  <!-- Διάλεξε ανάμεσα από τους καλύτερους -->
                </strong></p>

                <ul>
                    <li>
                    <p>
                      <?php echo _e("Once your peoject is published, you will start receiving bids for it"); ?>
                      <!-- Μόλις το Project σου δημοσιευτεί, θα αρχίσεις να λαμβάνεις προσφορές για την υλοποίηση του. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("Now you can view the profiles of the professionals, and also get in touch with them through the messages."); ?>
                      <!-- Τώρα μπορείς εύκολα να εξετάσεις τις προσφορές και τα προφίλ των επαγγελματιών, μπορείς επίσης να επικοινωνήσεις μαζί τους μέσω της εφαρμογής μηνυμάτων της GreyCell. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("Find the best professional and assign the project"); ?>
                      <!-- Μόλις βρεις τον κατάλληλο επαγγελματία, ανάθεσέ του την δουλειά επιλέγοντας “ανάθεση”. -->
                    </p>
                    </li>
                </ul>

                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                    <tbody class="mcnImageCardBlockOuter">
                        <tr>
                            <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                    <tbody><tr>
                        <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">
                            <a href="https://youtu.be/K1PDwSP9Fi4" title="" class="" target="">
                            <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/560b1da9d8e08074314c4d8df6787195.png" width="564" style="max-width:640px;" class="mcnImage">
                            </a>
                        </td>
                    </tr>
                </tbody></table>

                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
                    <tbody class="mcnDividerBlockOuter">
                        <tr>
                            <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                                    <tbody><tr>
                                        <td>
                                            <span></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody><tr>

                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                            <h1 style="text-align: center;"><strong><?php echo _e("Step 3"); ?></strong></h1>

                <p style="text-align: center;"><strong>
                  <?php echo _e("Rate your experience"); ?>
                  <!-- Αξιολόγησε την εμπειρία σου -->
                </strong></p>

                <ul>
                    <li>
                    <p>
                      <?php echo _e("Once the project is completed, you will be asked to rate your experience."); ?>
                      <!-- Μετά την ολοκλήρωση του Project σου, θα σου ζητήσουμε να αξιολογήσεις την εμπειρία σου. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("The GreyCell evalutaion system offers security and reliability"); ?>
                      <!-- Το σύστημα διπλής αξιολόγησης της GreyCell προσφέρει ασφάλεια και αξιοπιστία. -->
                    </p>
                    </li>
                    <li>
                    <p>
                      <?php echo _e("Every rating you make, helps us build a better community ofr our users"); ?>
                      <!-- Κάθε αξιολόγηση που κάνεις μας βοηθάει να φτιάξουμε μια καλύτερη κοινότητα για όλα τα μέλη μας. -->
                    </p>
                    </li>
                </ul>

                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
                    <tbody class="mcnImageCardBlockOuter">
                        <tr>
                            <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                <table align="right" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardBottomContent" width="100%" style="background-color: #404040;">
                    <tbody><tr>
                        <td class="mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px; padding-right:0px; padding-bottom:0; padding-left:0px;">
                            <a href="https://youtu.be/XV02I4Gserw" title="" class="" target="">
                            <img alt="" src="https://gallery.mailchimp.com/video_thumbnails_new/943462c22f2e17a0787577eb7cd0abce.png" width="564" style="max-width:640px;" class="mcnImage">
                            </a>
                        </td>
                    </tr>
                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                        <tbody><tr>
                          <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                            <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                            <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                            <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                          </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody>
        </table></td>
                                </tr>
                                <tr>
                                    <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
            <tr>
                <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                    <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table> <?php
            }?>

            <?php footer_get_mail(); ?>
        <?php
        $mail_message = ob_get_contents();
        ob_end_clean();

        //End of Mail Message

        ProjectTheme_send_email($user_email, $subject, $mail_message);
    }

    #THIS!!! ADMIN
    function ProjectTheme_new_user_notification_admin($user_id) {
        $user = new WP_User($user_id);

        $multilang_subject = _e('New user registration on your site', 'my-email-subject');
        $subject  == $multilang_subjects;
        $message 	= get_option('ProjectTheme_new_user_email_admin_message');

        $user_login = stripslashes($user->user_login);
        $user_email = stripslashes($user->user_email);

        $site_login_url = ProjectTheme_login_url();
        $site_name 		= get_bloginfo('name');
        $account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));

        $find 		= array('##username##', '##user_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##user_password##');
        $replace 	= array($user_login, $user_email, $site_login_url, $site_name, home_url(), $account_url, $plaintext_pass);
        $message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
        $subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);

        //---------------------------------------------

        $email = get_bloginfo('admin_email');
        ProjectTheme_send_email($email, $subject, $message);

    }


#THIS!!! GOOD
function ProjectTheme_send_email_on_plan_purchase($planId, $user_id) {

    $subject 	= get_option('ProjectTheme_send_email_on_plan_purchase_subject');
    $user = get_userdata($user_id);
    $user_email = stripslashes($user->user_email);
    $user_login = stripslashes($user->user_login);
    $bids = get_the_author_meta('myBids', $user_id);
    $sealed_bids = get_the_author_meta('mySealedBids', $user_id);

            ob_start(); ?>
            <?php header_get_mail(); ?>
            <body>
              <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
                <!--*|END:IF|*-->
                <center>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                        <tr>
                            <td align="center" valign="top" id="bodyCell">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                    <tr>
                                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                        <img align="center" alt="" src="https://gallery.mailchimp.com/e74121e3c976d77357eb0ccab/images/b4e7e26e-0a57-4405-9ec2-d1f0afc4afd9.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong>Ολοκλήρωση Αγοράς Πακέτου</strong></span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <br>
        <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?> <?php echo $user_login;?>,</span><br>
        <br>
        <?php echo _e("The purchase of GreyCell package has been completed"); ?>
        <!-- Η αγορά πακέτου GreyCell ολοκληρώθηκε. -->
        <br>
        &nbsp;
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;">
	<tbody class="mcnBoxedTextBlockOuter">
        <tr>
            <td valign="top" class="mcnBoxedTextBlockInner">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer">
                    <tbody><tr>

                        <td style="padding-top:12px; padding-left:18px; padding-right:18px;">

                            <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width: 100% !important;background-color: #65B6B7;">
                                <tbody><tr>
                                    <td valign="top" class="mcnTextContent" style="padding: 12px;color: #FFFFFF;font-family: Helvetica;font-size: 9px;font-weight: normal;text-align: center;">
                                        <span style="font-size:16px"><?php _e('My Bids', 'ProjectTheme'); ?></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;">
	<tbody class="mcnBoxedTextBlockOuter">
        <tr>
            <td valign="top" class="mcnBoxedTextBlockInner">

                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer">
                    <tbody><tr>

                    <td style="padding-left:18px; padding-right:18px;">

                        <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width: 100% !important;background-color: #FFFFFF;border: 1px solid;">
                            <tbody><tr>
                                <td valign="top" class="mcnTextContent" style="padding: 8px;color: #000000;font-family: Helvetica;font-size: 10px;font-weight: normal;text-align: center;">
                                    <span style="font-size:16px"><?php printf(__('%s Bids', 'ProjectTheme'), $bids); ?></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;">
	<tbody class="mcnBoxedTextBlockOuter">
        <tr>
            <td valign="top" class="mcnBoxedTextBlockInner">

                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer">
                    <tbody><tr>

                    <td style="padding-left:18px; padding-right:18px; padding-bottom: 20px">

                        <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width: 100% !important;background-color: #FFFFFF;border: 1px solid;">
                            <tbody><tr>
                                <td valign="top" class="mcnTextContent" style="padding: 8px;color: #000000;font-family: Helvetica;font-size: 10px;font-weight: normal;text-align: center;">
                                    <span style="font-size:16px"><?php printf(__('%s Sealed Bids', 'ProjectTheme'), $sealed_bids); ?></span>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                        <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                        <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                        <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                        <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                      </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
    </table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
                </td>
            </tr>
        </tbody>
    </table>

    <?php
    footer_get_mail();
    $mail_message = ob_get_contents();
    ob_end_clean();

    //End of Mail Message

    ProjectTheme_send_email($user_email, $subject, $mail_message);
}
add_action('after_paypal', 'ProjectTheme_send_email_on_plan_purchase', 40, 2);



function ProjectTheme_send_email_invitation_for_registration($user_id, $receiver_mail, $invitation_key) {
    $SENDER_BIDS = 1;
    $RECEIVER_BIDS = 1;
    $subject 	= get_option('ProjectTheme_send_email_invitation_for_registration_subject');
    $user = get_userdata($user_id);
    $user_email = stripslashes($user->user_email);
    $user_login = stripslashes($user->user_login);

            ob_start(); ?>
            <?php header_get_mail(); ?>
            <body>
              <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> </span><!--<![endif]-->
                <!--*|END:IF|*-->
                <center>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                        <tr>
                            <td align="center" valign="top" id="bodyCell">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                    <tr>
                                        <td valign="top" id="templatePreheader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
            <tbody class="mcnImageBlockOuter">
                    <tr>
                        <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                <tbody><tr>
                                    <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                                <img align="center" alt="" src="https://gallery.mailchimp.com/e74121e3c976d77357eb0ccab/images/b4e7e26e-0a57-4405-9ec2-d1f0afc4afd9.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateHeader"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>
                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                    <h1 class="null" style="text-align: center;"><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="font-size:48px"><strong>Πρόσκληση</strong></span></span></h1>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                            <tbody><tr>

                                <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

                                    <br>
        <span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><?php echo _e("Hi"); ?>,<br>
          <?php echo _e("the user "); ?>
        <!-- ο χρήστης  -->
        <?php echo $user_login;?>
        <?php echo _e("with email address "); ?>
         <!-- με ηλεκτρονική διεύθυνση -->
         <?php echo $user_email;?>
         <?php echo _e("has invited you to join GreyCell. Invite new customers easily and affordably. Accept the invitation and be a part of thisd platform. You and your friend will receive one "); ?>
         <!-- σας προσκάλεσε να εγγραφείτε στη Greycell. Προσελκύστε νέους πελάτες εύκολα και οικονομικά. Αποδεχθείτε αυτή τη πρόσκλησή και γίνετε μέλος της πλατφόρμας μας.  Εσείς και ο φίλος σας θα κερδίσετε από  -->
         <?php echo $SENDER_BIDS; ?> bid.</span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
            <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px;">
                        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
                            <tbody><tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>

                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px; text-align:center;">
                            <a style = "color: white; background: rgb(101, 181, 182); padding: 10px; border-radius: 15px;" href = "<?php echo home_url()?>/εγγραφή-από-πρόσκληση?invitation_key=<?php echo $invitation_key;?>" >Εγγραφή</a>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
    </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
            <tbody class="mcnTextBlockOuter">
                <tr>
                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                      <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                        <?php echo _e("If you have any questions, you can visit our pages"); ?> <a href="<?php echo _e("https://www.grey-cell.co.uk/post-new-project/"); ?>" target="_blank"><?php echo _e("Post new project"); ?></a> <?php echo _e("and"); ?>
                        <a href="<?php echo _e("https://www.grey-cell.co.uk/greycell-for-professionals/"); ?>" target="_blank"><?php echo _e("GreyCell for professionals"); ?></a>.<br>
                        <strong><?php echo _e("Thank you, GreyCell Team"); ?></strong><br><br><br>
                        <?php echo _e("Did you face any problems using our site?"); ?><br><?php echo _e("Please let us know at"); ?> <a href="mailto:support@grey-cell.co.uk">support@grey-cell.co.uk</a>.
                      </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
    </table></td>
                            </tr>
                            <tr>
                                <td valign="top" id="templateFooter"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EEEEEE;">
                    <tbody><tr>
                        <td>
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
                </td>
            </tr>
        </tbody>
    </table>


    <?php
    footer_get_mail();
    $mail_message = ob_get_contents();
    ob_end_clean();

    //End of Mail Message

    ProjectTheme_send_email($receiver_mail, $subject, $mail_message);
}

?>
