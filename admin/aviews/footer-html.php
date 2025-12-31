<?php 
if( !defined('admindp') ) exit(); 
?>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
         <div class="col-lg-12 col-md-10">
            <div class="footer-info">
              <h3>АДМИН</h3>
            </div>
         </div>
      </div>
    </div>
 
    <div class="container">
      <div class="copyright">
        2026 &copy; Copyright <strong><span><a href="https://bootstrapmade.com/day-multipurpose-html-template-for-free/">Взаимствано от тема: Day</a></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by <a href="https://github.com/panayotovdeyan?tab=projects">Deyan Panayotov</a>
      </div>
    </div>
  </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader123"></div>

  <!-- Vendor JS Files -->
  <script src="aassets/vendor/aos/aos.js"></script>
  <script src="aassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="aassets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="aassets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="aassets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="aassets/vendor/php-email-form/validate.js"></script>
  
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/super-build/ckeditor.js"></script>

  <script>
  document.addEventListener("DOMContentLoaded", function() {
      CKEDITOR.ClassicEditor
          .create(document.querySelector('#exampleFormControlTextarea1'), {
              // ИЗКЛЮЧВАМЕ ВСИЧКИ ПЛАТЕНИ ФУНКЦИИ, КОИТО ДАВАТ ГРЕШКИ
              removePlugins: [
                  'AIAssistant', 'FormatPainter', 'PasteFromOfficeEnhanced', 'CaseChange',
                  'MultiLevelLists', 'CheckWork', 'ExportPdf', 'ExportWord', 'CKBox', 
                  'CKFinder', 'EasyImage', 'CloudServices', 'RealTimeCollaborativeComments', 
                  'RealTimeCollaborativeTrackChanges', 'RealTimeCollaborativeRevisionHistory', 
                  'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData', 
                  'RevisionHistory', 'Pagination', 'WProofreader', 'MathType', 
                  'SlashCommand', 'Template', 'DocumentOutline', 'TableOfContents'
              ],
              toolbar: {
                  items: [
                      'heading', '|',
                      'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                      'bold', 'italic', 'underline', 'strikethrough', '|',
                      'alignment', '|',
                      'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                      'link', 'insertTable', 'blockQuote', '|',
                      'undo', 'redo'
                  ],
                  shouldNotGroupWhenFull: true
              },
              fontSize: {
                  options: [ 10, 12, 14, 'default', 18, 20, 22, 26, 30 ],
                  supportAllValues: true
              },
              alignment: {
                  options: [ 'left', 'center', 'right', 'justify' ]
              },
              language: 'bg',
              htmlSupport: {
                  allow: [{ name: /.*/, attributes: true, classes: true, styles: true }]
              }
          })
          .then(editor => {
              console.log('Редакторът е активиран успешно!');
          })
          .catch(error => {
              console.error('Грешка:', error);
          });
  });
  </script>

  <!-- <style>
      /* Запазваме стиловете за видимост */
      .ck-editor__editable_inline {
          min-height: 300px !important;
          background-color: white !important;
          color: black !important;
      }
      .ck.ck-reset_all, .ck.ck-reset_all * {
          color: #333 !important;
      }
  </style> -->
  <style>
      /* За височината и стила на редактора */
      .ck-editor__editable_inline {
          min-height: 200px;
          background-color: white !important;
          color: black !important;
      }
  </style>

  <!-- Template Main JS File -->
  <script src="aassets/js/main.js"></script>

</body>

</html>