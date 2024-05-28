<div class="header">
    <div class="container-loading ">
        <input type="radio" class="radio" name="progress" value="five" id="five" checked>
        <input type="radio" class="radio" name="progress" value="twentyfive" id="twentyfive">
        <input type="radio" class="radio" name="progress" value="fifty" id="fifty">
        <input type="radio" class="radio" name="progress" value="seventyfive" id="seventyfive">
        <input type="radio" class="radio" name="progress" value="onehundred" id="onehundred">

        <div class="progress">
            <div class="progress-bar"></div>
        </div>
    </div>
</div>

<div class="body">

    <section id="section-1" style="margin-top: -8%;">

        <div class="container">

            <div class="row">
                <div class="content">
                    <div class="conversation">
                        <div class="avatar-container">
                            <?= $this->Html->image('avatar4.png', ['class' => 'avatar-img']) ?>
                        </div>
                        <div class="speech-container">
                            <h2>Tape to Match the following options</h2>
                        </div>
                    </div>

                </div>
                <div class="options">



                    <div class="row">

                        <div class="col-sm-6 custom">
                            <ul class="sortable-list">
                                <?php
     foreach ($questions as $key => $value){?>
                                <li id="<?= $value['position']?>" class="item" draggable="false">
                                    <div class="details">
                                        <span> <?php echo  $key+1 .' - '. $value->question ?></span>
                                    </div>

                                </li>

                                <?php }
    ?>
                            </ul>
                        </div>



                        <div class="col-sm-6 custom answers">
                            <ul class="sortable-list">
                            </ul>
                        </div>
                        <?php
  $optionsList = [];      
  $correctOptions = []; 
shuffle($options);
?>
                        <div class="options">
                            <ol class="option-class sortable-list">
                                <?php
       
    $i = 0;
    foreach ($options as $key => $value) {?>

                                <li class="element" id="<?=  $value->id ?>">
                                    <?=  $value['qoption'] ?>
                                </li>
                                <?php
        $i++;
        if ($value->is_correct) {
            array_push($correctOptions , $value['qoption']);
        }
        array_push($optionsList , $value['qoption']);
    }
    


  ?>


                            </ol>
                        </div>




                    </div>

                </div>



            </div>
        </div>

    </section>



</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="wrong-alert">
                    <?= $this->Html->image('wrong.svg', ['alt' => 'textalternatif']) ?>
                    <div id="correct-answers"></div>
                </div>
                <div class="correct-alert">
                    <?= $this->Html->image('correct.svg', ['alt' => 'textalternatif']) ?>
                    <img src="correct.svg" alt="">
                    <h3 style="margin-left: 6%;" class="correct-title">Good Job !</h3>
                </div>

                <button id="skip" class="btn-skip">Skip</button>
            </div>

            <div class="col-6"><button id="next" class="btn-next next">Submit</button></div>
        </div>
    </div>
</div>




<script>
$(document).ready(function(event) {
    $("#draggable").draggable();
    $(".wrong-alert").hide();
    $(".correct-alert").hide();
    // Array to store selected options
    var selectedOptions = [];

    // Move item from options to answers
    $('.options').on('click', '.element', function() {
        var selectedOption = $(this).text().trim();
        var optionId = $(this).attr('id');
        selectedOptions.push(optionId);
        // Remove from options
        $(this).remove();
        // Append to answers
        $('.answers ul').append('<li class="item element" id="'+ optionId +'">' + selectedOption +
            '</li>');
    });

    // Move item from answers to options
    $('.answers').on('click', '.element', function() {
        var selectedOption = $(this).text().trim();
        var optionId = $(this).attr('id');
        var index = selectedOptions.indexOf(optionId);
        if (index !== -1) {
            selectedOptions.splice(index, 1);
        }
        // Remove from answers
        $(this).remove();
        // Append to options
        $('.options .option-class').append('<li class="element" id="'+ optionId +'">' + selectedOption +
            '</li>');
            console.log(selectedOptions);
    });

    function isArraySorted(arr) {
    // Clone the array to prevent modifying the original
    var sortedArr = arr.slice().sort();
    // Compare the original array with the sorted version
    for (var i = 0; i < arr.length; i++) {
        if (arr[i] !== sortedArr[i]) {
            return false; // Array is not sorted
        }
    }
    return true; // Array is sorted
}

    $('#next').on('click', function(e) {
        e.preventDefault();


        if (isArraySorted(selectedOptions)) {
            $('#skip').hide();
            $(".correct-alert").show();
            $(".wrong-alert").hide();
            $('#onehundred').prop('checked', true);
            $(this).css('background-color', 'rgb(147, 211, 51, 1)');

        } else {
            $('#skip').hide();
            $(".correct-alert").hide();
            $(".wrong-alert").show();
            $('#five').prop('checked', true);
            $('.footer').css('background-color', 'rgb(32 47 54)')
            $(this).css('background-color', 'rgb(216,72,72,1)');
            $('#correct-answers').html(
                '<h3 style="margin-left: 6%;" class="wrong-title">That was not the correct order !</h3>'
            );
        }

    });






});
</script>

<style>
.sortable-list {
    width: 425px;

    border-radius: 7px;
    padding: 0px 20px 0px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.sortable-list .item {
    list-style: none;
    display: flex;
    cursor: move;
    background-color: rgb(55, 70, 79, 1);

    align-items: center;
    border-radius: 5px;
    padding: 10px 13px;
    margin-bottom: 11px;
    justify-content: space-between;
}

.item .details {
    display: flex;
    align-items: center;
}

.item .details img {
    height: 43px;
    width: 43px;
    pointer-events: none;
    margin-right: 12px;
    object-fit: cover;
    border-radius: 50%;
}

.item .details span {
    font-size: 1.13rem;
}

.item i {
    color: black;
    font-size: 1.13rem;
}

.item.dragging {
    opacity: 0.6;
}

.item.dragging :where(.details, i) {
    opacity: 0;
}

body {
    background-color: rgb(19, 31, 36)
}

.container-loading {
    margin: 60px auto;
    width: 400px;
    text-align: center;
    margin-top: 1%;
}

.container-loading .progress {
    margin: 0 auto;
    width: 400px;
}

.progress {
    padding: 4px;
    background: rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
}

.progress-bar {
    height: 16px;
    border-radius: 4px;
    background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    -webkit-transition: 0.4s linear;
    -moz-transition: 0.4s linear;
    -o-transition: 0.4s linear;
    transition: 0.4s linear;
    -webkit-transition-property: width, background-color;
    -moz-transition-property: width, background-color;
    -o-transition-property: width, background-color;
    transition-property: width, background-color;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
}


#five:checked~.progress>.progress-bar {
    width: 5%;
    background-color: #86e01e;
}

#twentyfive:checked~.progress>.progress-bar {
    width: 25%;
    background-color: #86e01e;
}

#fifty:checked~.progress>.progress-bar {
    width: 50%;
    background-color: #86e01e;
}

#seventyfive:checked~.progress>.progress-bar {
    width: 75%;
    background-color: #86e01e;
}

#onehundred:checked~.progress>.progress-bar {
    width: 100%;
    background-color: #86e01e;
}

.radio {
    display: none;
}

.label {
    display: inline-block;
    margin: 0 5px 20px;
    padding: 3px 8px;
    color: #aaa;
    text-shadow: 0 1px black;
    border-radius: 3px;
    cursor: pointer;
}

.radio:checked+.label {
    color: white;
    background: rgba(0, 0, 0, 0.25);
}

.footer {
    border-top: 1px solid white;
    padding: 20px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}

.btn-skip,
.btn-next {
    padding: 10px 20px;
    background-color: rgb(147, 211, 51, 1);
    color: #fff;
    border: none;
    border-radius: 5px;
    width: 113px;
    cursor: pointer;
    margin-top: 4%;
}


.btn-skip {
    background-color: transparent;
    border: 2px solid rgb(55, 70, 79, 1);
    margin-right: auto;
}

.btn-next {
    display: block;
    margin-left: auto;
}

.line {
    color: white;
}

.title {
    color: white;
    text-align: center;
}

.content {
    color: white;
    text-align: center;
    border-bottom: 1px solid white;
}

.content {
    text-align: center;
    /* Center align the content */
}

.conversation {
    display: flex;
    align-items: center;
    /* Align items vertically */
}

.avatar-container {
    margin-right: 20px;
    /* Adjust spacing between avatar and speech */
}

.avatar-img {
    width: 100px;
    /* Adjust size as needed */
    height: auto;
    /* For circular avatars */
}

.speech-container {
    background-color: rgb(55, 70, 79, 1);
    border-radius: 10px;
    color: ;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    /* Optional: Add a shadow */
}

/* Style the speech text */
.speech-container h2 {
    margin: 0;
    /* Remove default margin */
}

.answers {
    border-bottom: 1px solid white;

    color: white;

}

.options {
    margin-top: 4%;
}

.answers ol,
.options ol {
    list-style-type: none;
    /* Remove default list styles */
    padding: 0;
    /* Remove default padding */
    margin: 0;
    /* Remove default margin */
    display: flex;
    /* Use flexbox */
}

.answers li,
.options li {
    margin-right: 10px;
    /* Adjust spacing between list items */
}

/* Optional: Adjust styling of list items */
.answers li,
.options li {
    background-color: rgb(55, 70, 79, 1);
    border-radius: 10px;
    padding: 10px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

.wrong-alert {
    display: flex;
    align-items: center;
    color: rgb(216 72 72);
    margin-left: 5%;
}

.correct-alert {
    display: flex;
    align-items: center;
    color: rgb(121, 185, 51, 1);
    margin-left: 5%;
}

.correct-alert img,
.wrong-alert img {
    display: block;
    margin: 8px 0 0 10px;
}

.alert {
    background: rgb(19, 31, 36, 1);
    border-radius: 98px;
    display: block;
    float: left;
    height: 80px;
    width: 80px;
}

@media (max-width: 450px) {
    .sortable-list {
        width: 178px;
    }

    .container-loading .progress {
        margin: 0 auto;
        width: 334px;
        margin-left: 5%;
        margin-top: 5%;
        margin-bottom: -13%;
    }

    .custom {
        width: 50%;
    }

    .options ol {
        margin-left: 7%;
    }

    .item .details span {
        font-size: 1rem;
    }
</style>