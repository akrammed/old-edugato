<script>
function init() {
    $(".wrong-alert").hide();
    $(".correct-alert").hide();
    $('#continue').hide();
    $('#check').prop('disabled', true).css('opacity', '0.2');
}

function isArraySorted(arr) {
    var sortedArr = arr.slice().sort();
    for (var i = 0; i < arr.length; i++) {
        if (arr[i] !== sortedArr[i]) {
            return false;
        }
    }
    return true;
}

function correctEvents() {
    $('#skip').hide();
    $(".correct-alert").show();
    $(".wrong-alert").hide();
    $('#onehundred').prop('checked', true);
    $('.footer').css('background-color', '#E1FCDE');
    $('#check').show();
    $('#check').css('background-color', 'white');
    $('#continue').hide();
    var audio = document.getElementById('correct-sound');
    if (audio) {
        audio.play();
    }
}

function wrongEvents() {
    $('#check').css('background-color', 'white');
    $('#check').show();
    $('#continue').hide();
    $('#continue').css('color', '#B1000F');
    $('#continue').css('border-color', '#B1000F');
    $('#skip').hide();
    $(".correct-alert").hide();
    $(".wrong-alert").show();
    $('#five').prop('checked', true);
    $('.footer').css('background-color', '#FFD4D8')
    $(this).css('background-color', 'rgb(216,72,72,1)');
    $(".wrong-alert").show();
    var audio = document.getElementById('false-sound');
    if (audio) {
        audio.play();
    }
}

function reTry(element) {
    $(element).on('click', function(e) {


    });
}

function getUnsortedPositions(arr) {
    const unsortedPositions = [];
    if (arr.length === 0) {
        return unsortedPositions;
    }
    for (let i = 0; i < arr.length - 1; i++) {
        const current = arr[i];
        const next = arr[i + 1];
        if (current > next) {
            for (let j = i; j < arr.length; j++) {
                unsortedPositions.push(j);
            }
            return unsortedPositions;
        }
    }
    return unsortedPositions;
}

function hasWrongPositions(arr) {
    const unsortedPositions = getUnsortedPositions(arr);
    return unsortedPositions.length === 0 ? true : unsortedPositions;
}

function getUnsortedElements(arr) {
    const unsortedIndices = new Set();
    for (let i = 0; i < arr.length + 1; i++) {
        if (arr[i] != i + 1) {
            unsortedIndices.add(i);
        }
    }
    const unsortedElements = Array.from(unsortedIndices).map(index => arr[index]);
    console.log(unsortedElements)
    return unsortedElements;
}

function areAllElementsUndefined(arr) {
    return arr.every(element => element === undefined);
}

function hasWrongPositionsMatch(arr) {
    const unsortedPositions = getUnsortedElements(arr);
    return unsortedPositions.length === 1 ? true : unsortedPositions;
}
</script>