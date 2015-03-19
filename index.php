<!DOCTYPE html>
<html>
<head>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css" media="screen,projection" rel="stylesheet" type="text/css"><!--Let browser know website is optimized for mobile-->
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#516873">

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://categorie.avgroenester.nl/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="http://categorie.avgroenester.nl/favicon/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="http://categorie.avgroenester.nl/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="http://categorie.avgroenester.nl/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="http://categorie.avgroenester.nl/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="http://categorie.avgroenester.nl/favicon/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="Atletiek categorie berekenen"/>
  <meta name="msapplication-TileColor" content="#C2473B" />
  <meta name="msapplication-TileImage" content="http://categorie.avgroenester.nl/favicon/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="http://categorie.avgroenester.nl/favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="http://categorie.avgroenester.nl/favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="http://categorie.avgroenester.nl/favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="http://categorie.avgroenester.nl/favicon/mstile-310x310.png" />

  <title>Atletiek categorie berekenen</title>
  <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body class="blue-grey">

  <main>
    <div class="row">
      <div class="col offset-l3 l6 offset-m1 m10 s12">
        <div class="card" id="birthdate-box">
          <div class="card-content">
            <span class="card-title teal-text">Atletiek categorie</span>
            <p>Met deze calculator kun je eenvoudig je atletiek categorie berekenen. Vul je geboortedatum maar eens in!</p>
          </div>


          <div class="card-action">
            <form id="birthdate-form" name="birthdate-form">
              <div class="row">

                <div class="input-field col m6 s12">
                  <select class="browser-default" id="month" name="month">
                    <option disabled selected>maand</option>
                    <option value="1">januari</option>
                    <option value="2">februari</option>
                    <option value="3">maart</option>
                    <option value="4">april</option>
                    <option value="5">mei</option>
                    <option value="6">juni</option>
                    <option value="7">juli</option>
                    <option value="8">augustus</option>
                    <option value="9">september</option>
                    <option value="10">oktober</option>
                    <option value="11">november</option>
                    <option value="12">december</option>
                  </select>
                </div>

                <div class="input-field col m6 s12">
                  <select class="browser-default" id="year" name="year">
                    <option disabled selected>jaar</option>
                    <?php 
                      $year = date('Y')-4;
                      for($i=$year; $i > $year-100; $i--) {
                        echo "<option>$i</option>\n";
                      }
                    ?>
                  </select>
                </div>
              </div>


              <div class="row">
                <div class="input-field col s6">
                  <button class="btn waves-effect waves-light" name="action" type="submit">Bereken <i class="mdi-content-send right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>


        <div class="section" id="result-section">
        </div>
      </div>
    </div>
  </main>


  <footer class="page-footer blue-grey darken-1">
    <div class="footer-copyright">
      <div class="container">
        &copy; 2015 Copyright Edwin Otten <a class="grey-text text-lighten-4 right" href="https://nl.linkedin.com/pub/edwin-otten/3a/707/328">Edwin on LinkedIn</a>
      </div>
    </div>
  </footer>

  <!--Import jQuery before materialize.js-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js" type="text/javascript"></script> 
  <script src="scripts.js" type="text/javascript"></script>
  <script>
    var currentYear = <?php echo date('Y'); ?>;
    var currentMonth = <?php echo date('m'); ?>;
    var i = 0;
    var marginTopBeforeAnimation = 0;

    $(function() {
      if (isIE()) {
        document.documentElement.setAttribute('data-useragent', 'IE');
      }

      $("#birthdate-form").submit(function (event) {
        event.preventDefault();

        var year = parseInt($("#birthdate-form #year").val());
        var month = parseInt($("#birthdate-form #month").val());

        if (isInteger(year) && isInteger(month)) {
            displayCategories(year, month);
        }
      });

    });
  </script>

</body>
</html>
