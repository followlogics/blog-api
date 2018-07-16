<!DOCTYPE html>
<html lang = "en" _vik>
    <head _vik>
        <title _vik><?= $title ?></title>
        <meta charset = "UTF-8" _vik>
        <meta _vik name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link _vik rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body _vik id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <span id="sls" _vik class="row content"><?php echo '&#8377; &#x20b9; Testing :' . ($name); ?></span>


        <?php
        $configFile = (base_path('public/media/config.json'));
        $myfile = fopen($configFile, "r+") or die("Unable to open file!");
        $config = fread($myfile, filesize($configFile));
        $configData = (json_decode($config, TRUE));
        if (!empty($configData)) {
            ?>
            <script _vik>
                var config =<?php echo $config ?>;
            </script>
            <?php
        }
        fclose($myfile);
        ?>
        <script _vik>
            function processAjaxData(response, urlPath) {
                document.getElementById("content").innerHTML = response.html;
                document.title = response.pageTitle;
                window.history.pushState({"html": response.html, "pageTitle": response.pageTitle}, "", urlPath);
            }
            window.onpopstate = function (e) {
                if (e.state) {
                    document.getElementById("content").innerHTML = e.state.html;
                    document.title = e.state.pageTitle;
                }
            };
            /* DOM content change detect */
            window.Virus = {
                starts: function () {

                    if (typeof document.body.addEventListener != 'undefined') {
                        document.body.addEventListener('DOMSubtreeModified', function (r,t) {
                           /* var ele=$(':not([_vik])');
                            if(ele.length){
                                 ele.remove();
                            }else{
                                 location.reload();
                            }*/
                        }, false);
                    } else if (typeof document.body.attachEvent != 'undefined') {
                        document.body.attachEvent('DOMSubtreeModified', function () {
                            // $(':not([_vik])').remove();
                        }, false);
                    }
                    
                },
                domValidation:function (mutations, observer) {
                    
                mutations.forEach(function(mutation) {
                    if(mutation.type == 'childList' || mutation.type=="characterData"){
                        var ele=':not([_vik])';
                        var allEle=document.querySelectorAll(ele);
                            if(allEle.length){
                                allEle.forEach(function(v){
                                     v.parentNode.removeChild(v);
                                })
                            }
                            if(mutation.addedNodes.length){
                                mutation.addedNodes.forEach(function(v){
                                    if(typeof v.data != 'undefined' && v.data.trim().length > 0){
                                        //  location.reload();
                                    }
                                })
                            }else if(typeof mutation.target.data != 'undefined'  && mutation.target.data.trim().length > 0){
                                // location.reload();
                            }
                    }else if(mutation.type == "attributes"){
                        if(mutation.attributeName == "id" ){
                            $('#'+mutation.target.id).parent().remove();
                        }else if(mutation.attributeName == "class"){
                            $('.'+mutation.target.className).removeClass(mutation.target.className);
                        }
                    }
                });
            }
            };
           
            MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

            var observer = new MutationObserver(window.Virus.domValidation );

            observer.observe(document, {subtree: true,attributes: true,childList: true, characterData: true,attributeOldValue: true,attributeNewValue: true});
            Virus.starts();
            window.onresize = function()
{
     if ((window.outerHeight - window.innerHeight) > 100)
         $('html').remove();
}
        </script>
        <script _vik type="text/javascript" src="{{ URL::asset('media/library.js') }}"></script>
        <script _vik src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>