<div class="">
    <div class="bg-gray200 p-3">
        <h3>Update video</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 p-3" style="background-color:#F9F9F9;">
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Import learning activities</strong></p>
                    <small>Select the activities you want to import to the current course. You can select multiple
                        activities from different courses at once.</small>
                </div>



            </div>
            <div class="col-8 p-3 ">
                <div class="" id="courseDiv">

                </div>
                <div id="" class="d-flex justify-content-start needId">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <button type="button" class="btn cntrl" id=""
                        style="height:30px !important;border-color: #DB5461 !important; margin-right:10px;">
                        Cancel
                    </button>
                    <button id="imortBtn" class="btn  btn-primary" style="height:30px !important;">
                        Import
                    </button>

                </div>




            </div>

        </div>

    </div>

</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '<?= $this->Url->build([
                'plugin' => 'Lms',
                'controller' => 'Courses',
                'action' => 'getAllCoursesApi'
            ]) ?>',
            type: 'GET',
            success: function (data) {
                var content = ``;
                for (var i in data.courses) {
                    content += `<div class=" text-bold bg-light bg-gradient dropdown d-block p-3 mb-2" type="button"
                    id="dropdownMenuButtonCourses0" data-toggle="dropdown1" aria-haspopup="false" aria-expanded="false"><strong>
            ${data.courses[i].title}</strong>
        `;

                    for (var j in data.courses[i].lessons) {
                        content += `<div class="dropdown1-menu" aria-labelledby="dropdownMenuButtonCourses0">
                        <div class="bg-light bg-gradient dropdown d-block p-3 mb-2" type="button"
                            id="dropdownMenuButtonCourses0" data-toggle="dropdown1" aria-haspopup="false"
                            aria-expanded="false">${data.courses[i].lessons[j].lesson}`
                        content += `<div class="dropdown1-menu mt-2" aria-labelledby="dropdownMenuButtonCourses0">`
                        for (var k in data.courses[i].lessons[j].chapters) {
                            content += `    <div class="dropdown-item border border-2 d-flex align-items-center p-2" id="cahpDiv${data.courses[i].lessons[j].chapters[k].id}" >
                              <input type="checkbox" id="chap${data.courses[i].lessons[j].chapters[k].id}" name="chapters[]" style="margin-right:20px;" value="${data.courses[i].lessons[j].chapters[k].id}">
                                <label for="chap${data.courses[i].lessons[j].chapters[k].id}">${data.courses[i].lessons[j].chapters[k].chapter}</label>


                              </div>`;

                        }
                        content += `</div></div><hr></div>`
                    }
                    content += `</div></div>`;
                }
                console.log(content);
                $('#courseDiv').html(content); // replace 'yourDiv' with the id of your div
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
        $('#imortBtn').click(function (event) {
            event.preventDefault();
            var csrfToken = $('input[name="_csrfToken"]').attr('value');
            var selectedCheckboxes = [];
            var lessonId = $(`input[name="lesson_id"]`).attr('value');
            $('input[name="chapters[]"]:checked').each(function () {
                selectedCheckboxes.push($(this).val());
            });
            $.ajax({
                url: '<?= $this->Url->build([
                    'plugin' => 'Lms',
                    'controller' => 'Chapters',
                    'action' => 'import'
                ]) ?>',

                method: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                data: {
                    data: selectedCheckboxes,
                    lessonId: lessonId
                },
                success: function (response) {
                    if (response.status == "good") {
                    var container = $('#popupContainer');

                    if ($('#popupContainer').is(":visible")) {
                        $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                            $(this).hide();
                            $(`#${popUpName}`).css('display', 'none');
                        })


                    }
                    Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "The chapters is imported",
                            showConfirmButton: false,
                            timer: 1500

                        });


                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            })
        })
    });
</script>
