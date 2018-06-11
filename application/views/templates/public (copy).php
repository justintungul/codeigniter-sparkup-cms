<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Website</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 mt-4">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $this->brand; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <?php if($this->pages) : ?>
              <?php foreach($this->pages as $page) : ?>
                <li>
                  <a class="nav-link" href="<?php echo base_url(); ?>pages/show/<?php echo $page->slug; ?>">
                    <?php echo $page->title; ?>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </nav>  

      <div class="jumbotron">
        <h1><?php echo $this->banner_heading; ?></h1>
        <p class="lead"><?php echo $this->banner_text; ?></p>
        <a class="btn btn-lg btn-primary" href="<?php echo $this->banner_link; ?>" role="button">View navbar docs &raquo;</a>
      </div>

      <div class="row">
        <div class="col-md-12">
          <!-- Load Main View -->
          <?php $this->load->view($main); ?>
        </div>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>