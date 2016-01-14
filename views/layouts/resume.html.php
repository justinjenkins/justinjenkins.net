<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Justin Jenkins">
    <meta name="author" content="Justin Jenkins">

    <title>justin jenkins (dot) net</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/resume.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
        <a class="navbar-brand" href="https://justinjenkins.net">justinjenkins.net</a>
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item">
                <a class="nav-link btn btn-primary-outline btn-sm" target="_blank" href="https://github.com/justinjenkins/justinjenkins.net#justin-jenkins-dot-net">view source on github</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="wrapper">
            <?php echo $this->content(); ?>
        </div>

    </div>

    <footer class="navbar navbar-dark bg-inverse" style="border-radius: 0px;">

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script>
        $("#modal-tinkering").on('hidden.bs.modal', function (e) {
            // make sure video stops playing when modal is closed
            $("#modal-tinkering iframe").attr("src", $("#modal-tinkering iframe").attr("src"));
        });
    </script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-72186020-1', 'auto');
      ga('send', 'pageview');

    </script>

</body>
</html>