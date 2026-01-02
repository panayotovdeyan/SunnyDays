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
    // 1. Дефинираме тези две неща ГЛОБАЛНО, за да са видими за HTML бутоните
    let editorInstance; 

    function clearEditorContent() {
        if (editorInstance) {
            if (confirm('Сигурни ли сте, че искате да изтриете целия текст в редактора?')) {
                editorInstance.setData(''); 
            }
        } else {
            console.error('Редакторът още не е зареден!');
        }
    }

    // Дефинираме нашия собствен "Куриер" (Upload Adapter)
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append('upload', file);

                    fetch('upload.php', { // Пътят до нашия файл
                        method: 'POST',
                        body: data
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.url) {
                            resolve({ default: result.url });
                        } else {
                            reject(result.error ? result.error.message : 'Грешка при качване');
                        }
                    })
                    .catch(error => {
                        reject('Грешка при връзка със сървъра');
                    });
                }));
        }

        abort() {
            // Тук може да се добави логика за прекъсване, ако е нужно
        }
    }

    // Функция, която регистрира адаптера в редактора
    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    // Инициализацията остава вътре, за да чака зареждането на HTML-а
    document.addEventListener("DOMContentLoaded", function() {
        const targetElement = document.querySelector('#exampleFormControlTextarea1');
        
        // Проверка дали елементът съществува на текущата страница
        if (targetElement) {
            CKEDITOR.ClassicEditor
                .create(targetElement, {
                  extraPlugins: [ MyCustomUploadAdapterPlugin ], // АКТИВИРАМЕ НАШИЯ АДАПТЕР
                    // ... Настройки (toolbar, removePlugins и т.н.) ...
                    removePlugins: [
                        'Base64UploadAdapter', 'AIAssistant', 'FormatPainter', 'PasteFromOfficeEnhanced', 'CaseChange',
                        'MultiLevelLists', 'CheckWork', 'ExportPdf', 'ExportWord', 'CKBox', 
                        'CKFinder', 'EasyImage', 'RealTimeCollaborativeComments', 
                        'RealTimeCollaborativeTrackChanges', 'RealTimeCollaborativeRevisionHistory', 
                        'PresenceList', 'Comments', 'TrackChanges', 'TrackChangesData', 
                        'RevisionHistory', 'Pagination', 'WProofreader', 'MathType', 
                        'SlashCommand', 'Template', 'DocumentOutline', 'TableOfContents'
                    ],
                    toolbar: {
                        items: [
                            'heading', '|', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|', 'alignment', '|',
                            'imageUpload', 'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                            'link', 'insertTable', 'blockQuote', '|', 'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    simpleUpload: {
                        uploadUrl: 'upload.php'
                    },
                    language: 'bg',
                    htmlSupport: {
                        allow: [{ name: /.*/, attributes: true, classes: true, styles: true }]
                    }
                })
                .then(editor => {
                    console.log('Редакторът е активиран успешно!');
                    editorInstance = editor; // Присвояваме го на глобалната променлива
                })
                .catch(error => {
                    console.error('Грешка при старт на редактора:', error);
                });
        }
    });
  </script>

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