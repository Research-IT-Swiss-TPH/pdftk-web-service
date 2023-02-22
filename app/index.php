<?php
namespace swisstph\tertek\pdftk;
/**
 * Author: Ekin Tertemiz
 * Description: Web UI for using PDFtk to process PDFs
 * 
 * Version: 1.0
 * 
 */

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdftk web service | Free your PDF and make them fillable</title>
    <meta name="title" content="pdftk service| Free your PDF">
    <meta name="description" content="pdftk web service to process your PDFs and make them fillable">
    <meta name="keywords" content="pdftk, web, micro service, web service, free, pdf, fillable, fpdm">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Ekin Tertemiz">    
    <link rel="stylesheet" href="lib/bulma.min.css">
    <link rel="stylesheet" href="lib/font-awesome-5.min.css"/>
  </head>
  <body>
    <section class="hero is-primary">
    <div class="hero-body">
      <p class="title"><span style="font-family: 'Courier New', Courier, monospace;">pdftk</span> web service</p>
      <p class="subtitle">
        Free your <strong>PDF</strong> and make them <strong>fillable</strong>
      </p>
    </div>
    </section>    
    <section class="section">
      <div class="container">
        
        <div class="columns is-centered is-vcentered">
          <div class="column is-half-desktop">
          <form action="" method="post" enctype="multipart/form-data" class="box mt-3">
          <div class="field">
            <label class="label">Upload & Convert</label>
            Maximum 20MB and only PDF files allowed.
          </div>
          <div id="file-uploader-wrapper" class="field">
            <div id="file-uploader" class="file">
              <label class="file-label">
                <input class="file-input" type="file" name="file">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose a file…
                  </span>
                </span>
                <span class="file-name is-hidden"></span>
              </label>
            </div>
            <p id="valid-file" class="help is-success is-hidden">The file is a valid PDF document.</p>        
            <p id="invalid-size" class="help is-danger is-hidden">The file is too big. Maximum allowed file size is 20 MB.</p>
            <p id="invalid-type" class="help is-danger is-hidden">The file is of wrong type. Allowed file type is PDF.</p>        
          </div>      
          <div class="field">
            <div class="control">
              <input id="submit-convert" class="button is-primary" type="submit" value="Convert" disabled>
            </div>        
          </div>

          <div class="field">
            <div id="server-error" class="notification is-danger is-hidden"></div>
          </div>

          <div id="progress-bar" class="field is-hidden">
            <div id="progress-status" class="mb-3">Processing..</div>
            <div class="control">
              <progress class="progress is-small is-primary is-light" max="100"></progress>
            </div>
          </div>

          <a id="download-button" href="#download" class="button is-large is-fullwidth is-success is-light is-hidden">Download</a>
          
          <div class="has-text-right"><small><a target="_blank" href="https://gitlab.swisstph.ch/tertek/pdftk-web-service/-/issues/new"><i class="fas fa-bug"></i> Found a bug?</a></small></div>

        </form>          

          </div>
        </div>

      </div>
    </section>

    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <strong>pdftk web service</strong> powered by <a target="_blank" href="https://swisstph.ch">Swiss TPH</a>
          <br>Using pdftk by <a target="_blank" href="https://www.pdflabs.com">PDF Labs</a>.
        </p>
      </div>
      <div class="content has-text-centered">
        <p><a  target="_blank" href="https://gitlab.swisstph.ch/tertek/pdftk-web-service"><i class="fab fa-gitlab"></i></a></p>
      </div>
    </footer>
    <script src="lib/jquery.min.js"></script>    
    <script src="js/main.js"></script>
  </body>
</html>