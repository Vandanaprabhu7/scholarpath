<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.01);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }

        .card-body {
            padding: 20px;
        }

        h4 {
            text-align: center;
            margin-bottom: 0;
        }

        p {
            margin-bottom: 5px;
        }

        .pdf-link {
            color: #fff;
        }

        .pdf-link:hover {
            text-decoration: none;
        }

        .pdf-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .pdf-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Applications</h2>
        <hr>
        <?php if ($myapplications->isempty()) {
            echo "<p class='alert alert-warning'>No applications available.</p>";
        } ?>
        @foreach($myapplications as $entity)
        <?php
        $jsonString1 = optional($entity['applications'])->value;
        $data = json_decode($jsonString1, true);
        ?>
        <?php
        $sclname = $entity['scholarship_name'];
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <h4>{{$sclname}}</h4>
            </div>
            @if (!is_null($data) && is_array($data))
            <div class="card-body">

                @foreach($data as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        @if(isset($user['name']) && $user['name'] !== null)
                        <p><strong>Name:</strong> {{ $user['name'] }}</p>
                        @endif
                        @if(isset($user['address']) && $user['address'] !== null)
                        <p><strong>Address:</strong> {{ $user['address'] }}</p>
                        @endif
                        @if(isset($user['phoneno']) && $user['phoneno'] !== null)
                        <p><strong>Phone Number:</strong> {{ $user['phoneno'] }}</p>
                        @endif
                        @if(isset($user['email']) && $user['email'] !== null)
                        <p><strong>Email:</strong> {{ $user['email'] }}</p>
                        @endif
                        @if(isset($user['gender']) && $user['gender'] !== null)
                        <p><strong>Gender:</strong> {{ $user['gender'] }}</p>
                        @endif
                        <hr>
                        <h6><b>Documents:</b></h6>
                        @if(isset($user['filepath1']) && $user['filepath1'] !== null)
                        <a href="{{ $user['filepath1'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Aadhar Card</span>
                        </a>
                        @endif
                        @if(isset($user['filepath2']) && $user['filepath2'] !== null)
                        <a href="{{ $user['filepath2'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Caste Certificate</span>
                        </a>
                        @endif
                        @if(isset($user['filepath3']) && $user['filepath3'] !== null)
                        <a href="{{ $user['filepath3'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Income Certificate</span>
                        </a>
                        @endif
                        @if(isset($user['filepath4']) && $user['filepath4'] !== null)
                        <a href="{{ $user['filepath4'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Domicile Certificate</span>
                        </a>
                        @endif
                        @if(isset($user['filepath5']) && $user['filepath5'] !== null)
                        <a href="{{ $user['filepath5'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Marks Sheet</span>
                        </a>
                        @endif
                        @if(isset($user['filepath6']) && $user['filepath6'] !== null)
                        <a href="{{ $user['filepath6'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Fee Receipt</span>
                        </a>
                        @endif
                        @if(isset($user['filepath7']) && $user['filepath7'] !== null)
                        <a href="{{ $user['filepath7'] }}" class="pdf-link" target="_blank">
                            <span class="pdf-button">Passport Photo</span>
                        </a>
                        @endif
                        <hr>
                        <!-- Accept and Reject buttons -->
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-success accept-button mr-2" id="accept" onclick="acceptapp(`{{$user['email']}}`)">Accept</button>
                            <button type="button" class="btn btn-danger reject-button" id="reject" onclick="rejectapp(`{{$user['email']}}`)">Reject</button>
                            <script src="https://smtpjs.com/v3/smtp.js"></script>
                            <script>
                                function acceptapp(email) {
                                    var recipients = "vandanaprabhu702@gmail.com,shetvaish@gmail.com";
                                    console.log(email)
                                    Email.send({
                                        Host: "smtp.elasticemail.com",
                                        Username: "vandanaprabhu702@gmail.com",
                                        Password: "ECE65D1578529A982F0CCF537C56FD007684",
                                        To: email,
                                        From: 'vandanaprabhu702@gmail.com',
                                        Subject: "ScholarPath",
                                        Body: `<!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                    
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
        
                <meta name="color-scheme" content="light">
                <meta name="supported-color-schemes" content="light">
        
                
                <!--[if !mso]><!-->
                  
                <!--<![endif]-->
        
                <!--[if mso]>
                  <style>
                      // TODO: fix me!
                      * {
                          font-family: sans-serif !important;
                      }
                  </style>
                <![endif]-->
            
                
                <!-- NOTE: the title is processed in the backend during the campaign dispatch -->
                <title></title>
        
                <!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
                
            <style>
                :root {
                    color-scheme: light;
                    supported-color-schemes: light;
                }
        
                html,
                body {
                    margin: 0 auto !important;
                    padding: 0 !important;
                    height: 100% !important;
                    width: 100% !important;
        
                    overflow-wrap: break-word;
                    -ms-word-break: break-all;
                    -ms-word-break: break-word;
                    word-break: break-all;
                    word-break: break-word;
                }
        
        
                
          direction: undefined;
          center,
          #body_table{
            
          }
        
          .paragraph {
            font-size: 14px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          ul, ol {
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
          }
        
          li {
            margin-bottom: 0;
          }
         
          .list-block-list-outside-left li {
            margin-left: 20px;
          }
        
          .list-block-list-outside-right li {
            margin-right: 20px;
          }
          
          .heading1 {
            font-weight: 400;
            font-size: 28px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          .heading2 {
            font-weight: 400;
            font-size: 20px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          .heading3 {
            font-weight: 400;
            font-size: 16px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
          
          a {
            color: #cd8c30;
            text-decoration: none;
          }
          
        
        
                * {
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                }
        
                div[style*="margin: 16px 0"] {
                    margin: 0 !important;
                }
        
                #MessageViewBody,
                #MessageWebViewDiv {
                    width: 100% !important;
                }
        
                table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important;
                }
                table:not(.button-table) {
                    border-spacing: 0 !important;
                    border-collapse: collapse !important;
                    table-layout: fixed !important;
                    margin: 0 auto !important;
                }
        
                th {
                    font-weight: normal;
                }
        
                tr td p {
                    margin: 0;
                }
        
                img {
                    -ms-interpolation-mode: bicubic;
                }
        
                a[x-apple-data-detectors],
        
                .unstyle-auto-detected-links a,
                .aBn {
                    border-bottom: 0 !important;
                    cursor: default !important;
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }
        
                .im {
                    color: inherit !important;
                }
        
                .a6S {
                    display: none !important;
                    opacity: 0.01 !important;
                }
        
                img.g-img+div {
                    display: none !important;
                }
        
                @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                    u~div .contentMainTable {
                        min-width: 320px !important;
                    }
                }
        
                @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                    u~div .contentMainTable {
                        min-width: 375px !important;
                    }
                }
        
                @media only screen and (min-device-width: 414px) {
                    u~div .contentMainTable {
                        min-width: 414px !important;
                    }
                }
            </style>
        
            <style>
                @media only screen and (max-device-width: 600px) {
                    .contentMainTable {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .single-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .multi-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .imageBlockWrapper {
                        width: 100% !important;
                        margin: auto !important;
                    }
                }
                @media only screen and (max-width: 600px) {
                    .contentMainTable {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .single-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .multi-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .imageBlockWrapper {
                        width: 100% !important;
                        margin: auto !important;
                    }
                }
            </style>
            <style></style>
            
        <!--[if mso | IE]>
            <style>
                .list-block-outlook-outside-left {
                    margin-left: -18px;
                }
            
                .list-block-outlook-outside-right {
                    margin-right: -18px;
                }
        
            </style>
        <![endif]-->
        
        
            </head>
        
            <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #efefef;">
                <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color: #efefef;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" id="body_table" style="background-color: #efefef;">
                    <tbody>    
                        <tr>
                            <td>
                            <![endif]-->
                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="contentMainTable">
                                    <tr class="wp-block-editor-spacerblock-v1"><td style="background-color:#EFEFEF;line-height:30px;font-size:30px;width:100%;min-width:100%">&nbsp;</td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 20px 20px;background-color:#EFEFEF"><p class="paragraph" style="font-family:Helvetica, sans-serif;text-align:right;line-height:1.15;font-size:9px;margin:0;color:#4A5568;word-break:normal">Unable to view? Read it <a href="{view}" data-type="mergefield" data-id="df81370a-ecd3-455f-9de8-f24576e72260-yTJQHrdYhYCwuUX8e_vjD" data-filename="" class="df81370a-ecd3-455f-9de8-f24576e72260-yTJQHrdYhYCwuUX8e_vjD" data-mergefield-value="view" data-mergefield-input-value="" style="color: #cd8c30;">Online</a></p></td></tr><tr class="wp-block-editor-imageblock-v1"><td style="background-color:#EFEFEF;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px" align="center"><table align="center" width="168" class="imageBlockWrapper" style="width:168px" role="presentation"><tbody><tr><td style="padding:0"><img src="/images/logo.png" width="168" height="" alt="" style="border-radius:0px;display:block;height:auto;width:100%;max-width:100%;border:0" class="g-img"></td></tr></tbody></table></td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 5px 20px;background-color:#FFFFFF"><p class="paragraph" style="font-family:Helvetica, sans-serif;text-align:center;direction:ltr;line-height:1.15;font-size:24px;margin:0;color:#4A5568;letter-spacing:0;word-break:normal"><a href="{url}" data-type="mergefield" data-filename="" data-id="2f9d5c85-09fe-43be-a031-e21353eff654-4_nMFVYxXK77hHT8FAPat" class="2f9d5c85-09fe-43be-a031-e21353eff654-4_nMFVYxXK77hHT8FAPat" data-mergefield-value="url" data-mergefield-input-value="" style="color: #cd8c30;">ScholarPath</a></p></td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 20px 20px;background-color:#fff"><p class="paragraph" style="font-family:Helvetica, sans-serif;line-height:1.15;font-size:16px;margin:0;color:#4A5568;letter-spacing:0;word-break:normal">Dear user,<br><br>I hope this message finds you well. We want to inform you that your application has been accepted. <br><br>We request you to contact the scholarship provider and submit the necessary documents<br><br>If you have any questions or require assistance, feel free to reach out to our dedicated support team at <a href="{vandanaprabhu702@gmail.com}" data-type="mergefield" data-id="3d08b48a-6a47-4681-97d2-d7a6fc793f79-IJnBS9_z5-kMvqE9QOhGX" data-filename="" data-mergefield-value="custom" data-mergefield-input-value="vandanaprabhu702@gmail.com" class="3d08b48a-6a47-4681-97d2-d7a6fc793f79-IJnBS9_z5-kMvqE9QOhGX" style="color: #cd8c30;">shetvaish@gmail.com</a>.<br><br>Thank you once again for choosing ScholarPath. We appreciate the opportunity to serve you, and we\'re confident that your experience with us will be both rewarding and enjoyable.<br><br>Best regards,<br>[Your Name]<br>[Your Title/Position]<br>ScholarPath<br>[Contact Information]</p></td></tr><tr class="wp-block-editor-imageblock-v1"><td style="background-color:#fff;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0" align="center"><table align="center" width="210" class="imageBlockWrapper" style="width:210px" role="presentation"><tbody><tr><td style="padding:0"><img src="https://api.smtprelay.co/userfile/fce461b2-a74a-4a02-9c15-840c04e135f3/thank-you-note-1.jpg" width="210" height="" alt="" style="border-radius:0px;display:block;height:auto;width:100%;max-width:100%;border:0" class="g-img"></td></tr></tbody></table></td></tr><tr class="wp-block-editor-headingblock-v1"><td valign="top" style="background-color:#fff;display:block;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;text-align:center"><p style="font-family:Helvetica, sans-serif;text-align:center;line-height:23.00px;font-size:20px;background-color:#fff;color:#4A5568;margin:0;word-break:normal" class="heading2">Follow us on</p></td></tr><tr class="wp-block-editor-socialiconsblock-v1" role="article" aria-roledescription="social-icons" style="display:table-row;background-color:#fff"><td style="width:100%"><table style="background-color:#fff;width:100%;padding-top:15px;padding-bottom:32px;padding-left:32px;padding-right:32px;border-collapse:separate !important" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td align="center" valign="top"><div style="max-width:536px"><table role="presentation" style="width:100%" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td valign="top"><div style="margin-left:auto;margin-right:auto;margin-top:-3.75px;margin-bottom:-3.75px;width:100%;max-width:141px"><table role="presentation" style="padding-left:197.5" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://twitter.com" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/x/x-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="X (formerly Twitter)"></a></td></tr></tbody></table><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://www.linkedin.com/company/inspirante-technologies-pvt-ltd/?originalSubdomain=in" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/linkedin/linkedin-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="LinkedIn"></a></td></tr></tbody></table><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://instagram.com" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/website/website-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="Website"></a></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></td></tr><tr><td valign="top" align="center" style="padding:20px 20px 20px 20px;background-color:#EFEFEF"><p aria-label="Unsubscribe" class="paragraph" style="font-family:Helvetica, sans-serif;text-align:center;line-height:1.5;font-size:10px;margin:0;color:#4A5568;word-break:normal">If you no longer wish to receive mail from us, you can <a class="1cb2588b-49d7-4c8d-a348-f27ebc6d39ef-1wHsblXB5dTCxc1zbMcCV" href="{unsubscribe}" data-type="mergefield" data-id="1cb2588b-49d7-4c8d-a348-f27ebc6d39ef-1wHsblXB5dTCxc1zbMcCV" data-filename="" data-mergefield-value="unsubscribe" data-mergefield-input-value="" style="color: #cd8c30;">unsubscribe</a>.<br>{inspirante}</p></td></tr>
                                </table>
                            <!--[if mso | IE]>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    <![endif]-->
                </center>
            </body>
        </html>`
                                    }).then(() => {
                                        Swal.fire({
                                            title: "Sent Successfully",
                                            text: "Thank you for you time!",
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false,
                                        });
                                    });
                                }


                                function rejectapp(email) {
                                    var recipients = "vandanaprabhu702@gmail.com,shetvaish@gmail.com";
                                    console.log(email)
                                    Email.send({
                                        Host: "smtp.elasticemail.com",
                                        Username: "vandanaprabhu702@gmail.com",
                                        Password: "ECE65D1578529A982F0CCF537C56FD007684",
                                        To: email,
                                        From: 'vandanaprabhu702@gmail.com',
                                        Subject: "ScholarPath",
                                        Body: `<!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                    
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="x-apple-disable-message-reformatting">
                <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
        
                <meta name="color-scheme" content="light">
                <meta name="supported-color-schemes" content="light">
        
                
                <!--[if !mso]><!-->
                  
                <!--<![endif]-->
        
                <!--[if mso]>
                  <style>
                      // TODO: fix me!
                      * {
                          font-family: sans-serif !important;
                      }
                  </style>
                <![endif]-->
            
                
                <!-- NOTE: the title is processed in the backend during the campaign dispatch -->
                <title></title>
        
                <!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
                
            <style>
                :root {
                    color-scheme: light;
                    supported-color-schemes: light;
                }
        
                html,
                body {
                    margin: 0 auto !important;
                    padding: 0 !important;
                    height: 100% !important;
                    width: 100% !important;
        
                    overflow-wrap: break-word;
                    -ms-word-break: break-all;
                    -ms-word-break: break-word;
                    word-break: break-all;
                    word-break: break-word;
                }
        
        
                
          direction: undefined;
          center,
          #body_table{
            
          }
        
          .paragraph {
            font-size: 14px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          ul, ol {
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
          }
        
          li {
            margin-bottom: 0;
          }
         
          .list-block-list-outside-left li {
            margin-left: 20px;
          }
        
          .list-block-list-outside-right li {
            margin-right: 20px;
          }
          
          .heading1 {
            font-weight: 400;
            font-size: 28px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          .heading2 {
            font-weight: 400;
            font-size: 20px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
        
          .heading3 {
            font-weight: 400;
            font-size: 16px;
            font-family: Helvetica, sans-serif;
            color: #4A5568;
          }
          
          a {
            color: #cd8c30;
            text-decoration: none;
          }
          
        
        
                * {
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                }
        
                div[style*="margin: 16px 0"] {
                    margin: 0 !important;
                }
        
                #MessageViewBody,
                #MessageWebViewDiv {
                    width: 100% !important;
                }
        
                table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important;
                }
                table:not(.button-table) {
                    border-spacing: 0 !important;
                    border-collapse: collapse !important;
                    table-layout: fixed !important;
                    margin: 0 auto !important;
                }
        
                th {
                    font-weight: normal;
                }
        
                tr td p {
                    margin: 0;
                }
        
                img {
                    -ms-interpolation-mode: bicubic;
                }
        
                a[x-apple-data-detectors],
        
                .unstyle-auto-detected-links a,
                .aBn {
                    border-bottom: 0 !important;
                    cursor: default !important;
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }
        
                .im {
                    color: inherit !important;
                }
        
                .a6S {
                    display: none !important;
                    opacity: 0.01 !important;
                }
        
                img.g-img+div {
                    display: none !important;
                }
        
                @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                    u~div .contentMainTable {
                        min-width: 320px !important;
                    }
                }
        
                @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                    u~div .contentMainTable {
                        min-width: 375px !important;
                    }
                }
        
                @media only screen and (min-device-width: 414px) {
                    u~div .contentMainTable {
                        min-width: 414px !important;
                    }
                }
            </style>
        
            <style>
                @media only screen and (max-device-width: 600px) {
                    .contentMainTable {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .single-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .multi-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .imageBlockWrapper {
                        width: 100% !important;
                        margin: auto !important;
                    }
                }
                @media only screen and (max-width: 600px) {
                    .contentMainTable {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .single-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .multi-column {
                        width: 100% !important;
                        margin: auto !important;
                    }
                    .imageBlockWrapper {
                        width: 100% !important;
                        margin: auto !important;
                    }
                }
            </style>
            <style></style>
            
        <!--[if mso | IE]>
            <style>
                .list-block-outlook-outside-left {
                    margin-left: -18px;
                }
            
                .list-block-outlook-outside-right {
                    margin-right: -18px;
                }
        
            </style>
        <![endif]-->
        
        
            </head>
        
            <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #efefef;">
                <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color: #efefef;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" id="body_table" style="background-color: #efefef;">
                    <tbody>    
                        <tr>
                            <td>
                            <![endif]-->
                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="contentMainTable">
                                    <tr class="wp-block-editor-spacerblock-v1"><td style="background-color:#EFEFEF;line-height:30px;font-size:30px;width:100%;min-width:100%">&nbsp;</td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 20px 20px;background-color:#EFEFEF"><p class="paragraph" style="font-family:Helvetica, sans-serif;text-align:right;line-height:1.15;font-size:9px;margin:0;color:#4A5568;word-break:normal">Unable to view? Read it <a href="{view}" data-type="mergefield" data-id="df81370a-ecd3-455f-9de8-f24576e72260-yTJQHrdYhYCwuUX8e_vjD" data-filename="" class="df81370a-ecd3-455f-9de8-f24576e72260-yTJQHrdYhYCwuUX8e_vjD" data-mergefield-value="view" data-mergefield-input-value="" style="color: #cd8c30;">Online</a></p></td></tr><tr class="wp-block-editor-imageblock-v1"><td style="background-color:#EFEFEF;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px" align="center"><table align="center" width="168" class="imageBlockWrapper" style="width:168px" role="presentation"><tbody><tr><td style="padding:0"><img src="/images/logo.png" width="168" height="" alt="" style="border-radius:0px;display:block;height:auto;width:100%;max-width:100%;border:0" class="g-img"></td></tr></tbody></table></td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 5px 20px;background-color:#FFFFFF"><p class="paragraph" style="font-family:Helvetica, sans-serif;text-align:center;direction:ltr;line-height:1.15;font-size:24px;margin:0;color:#4A5568;letter-spacing:0;word-break:normal"><a href="{url}" data-type="mergefield" data-filename="" data-id="2f9d5c85-09fe-43be-a031-e21353eff654-4_nMFVYxXK77hHT8FAPat" class="2f9d5c85-09fe-43be-a031-e21353eff654-4_nMFVYxXK77hHT8FAPat" data-mergefield-value="url" data-mergefield-input-value="" style="color: #cd8c30;">ScholarPath</a></p></td></tr><tr class="wp-block-editor-paragraphblock-v1"><td valign="top" style="padding:20px 20px 20px 20px;background-color:#fff"><p class="paragraph" style="font-family:Helvetica, sans-serif;line-height:1.15;font-size:16px;margin:0;color:#4A5568;letter-spacing:0;word-break:normal">Dear user,<br><br>I hope this message finds you well. We are sad to inform you that your application has been rejected. <br><br>We request you to contact the scholarship provider for further information.<br><br>If you have any questions or require assistance, feel free to reach out to our dedicated support team at <a href="{vandanaprabhu702@gmail.com}" data-type="mergefield" data-id="3d08b48a-6a47-4681-97d2-d7a6fc793f79-IJnBS9_z5-kMvqE9QOhGX" data-filename="" data-mergefield-value="custom" data-mergefield-input-value="vandanaprabhu702@gmail.com" class="3d08b48a-6a47-4681-97d2-d7a6fc793f79-IJnBS9_z5-kMvqE9QOhGX" style="color: #cd8c30;">shetvaish@gmail.com</a>.<br><br>Thank you once again for choosing ScholarPath. We appreciate the opportunity to serve you, and we\'re confident that your experience with us will be both rewarding and enjoyable.<br><br>Best regards,<br>[Your Name]<br>[Your Title/Position]<br>ScholarPath<br>[Contact Information]</p></td></tr><tr class="wp-block-editor-imageblock-v1"><td style="background-color:#fff;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0" align="center"><table align="center" width="210" class="imageBlockWrapper" style="width:210px" role="presentation"><tbody><tr><td style="padding:0"><img src="https://api.smtprelay.co/userfile/fce461b2-a74a-4a02-9c15-840c04e135f3/thank-you-note-1.jpg" width="210" height="" alt="" style="border-radius:0px;display:block;height:auto;width:100%;max-width:100%;border:0" class="g-img"></td></tr></tbody></table></td></tr><tr class="wp-block-editor-headingblock-v1"><td valign="top" style="background-color:#fff;display:block;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;text-align:center"><p style="font-family:Helvetica, sans-serif;text-align:center;line-height:23.00px;font-size:20px;background-color:#fff;color:#4A5568;margin:0;word-break:normal" class="heading2">Follow us on</p></td></tr><tr class="wp-block-editor-socialiconsblock-v1" role="article" aria-roledescription="social-icons" style="display:table-row;background-color:#fff"><td style="width:100%"><table style="background-color:#fff;width:100%;padding-top:15px;padding-bottom:32px;padding-left:32px;padding-right:32px;border-collapse:separate !important" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td align="center" valign="top"><div style="max-width:536px"><table role="presentation" style="width:100%" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td valign="top"><div style="margin-left:auto;margin-right:auto;margin-top:-3.75px;margin-bottom:-3.75px;width:100%;max-width:141px"><table role="presentation" style="padding-left:197.5" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://twitter.com" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/x/x-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="X (formerly Twitter)"></a></td></tr></tbody></table><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://www.linkedin.com/company/inspirante-technologies-pvt-ltd/?originalSubdomain=in" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/linkedin/linkedin-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="LinkedIn"></a></td></tr></tbody></table><table role="presentation" align="left" style="float:left" class="single-social-icon" cellpadding="0" cellspacing="0"><tbody><tr><td valign="top" style="padding-top:3.75px;padding-bottom:3.75px;padding-left:7.5px;padding-right:7.5px;border-collapse:collapse !important;border-spacing:0;font-size:0"><a class="social-icon--link" href="https://instagram.com" target="_blank" rel="noreferrer"><img src="https://template-editor-assets.s3.eu-west-3.amazonaws.com/assets/social-icons/website/website-square-solid-color.png" width="32" height="32" style="max-width:32px;display:block;border:0" alt="Website"></a></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></td></tr><tr><td valign="top" align="center" style="padding:20px 20px 20px 20px;background-color:#EFEFEF"><p aria-label="Unsubscribe" class="paragraph" style="font-family:Helvetica, sans-serif;text-align:center;line-height:1.5;font-size:10px;margin:0;color:#4A5568;word-break:normal">If you no longer wish to receive mail from us, you can <a class="1cb2588b-49d7-4c8d-a348-f27ebc6d39ef-1wHsblXB5dTCxc1zbMcCV" href="{unsubscribe}" data-type="mergefield" data-id="1cb2588b-49d7-4c8d-a348-f27ebc6d39ef-1wHsblXB5dTCxc1zbMcCV" data-filename="" data-mergefield-value="unsubscribe" data-mergefield-input-value="" style="color: #cd8c30;">unsubscribe</a>.<br>{inspirante}</p></td></tr>
                                </table>
                            <!--[if mso | IE]>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    <![endif]-->
                </center>
            </body>
        </html>`
                                    }).then(() => {
                                        Swal.fire({
                                            title: "Sent Successfully",
                                            text: "Thank you for you time!",
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false,
                                        });
                                    });
                                }
                            </script>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h6 style="text-align:center">No applications available</h6>
            @endif
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>


</body>

</html>