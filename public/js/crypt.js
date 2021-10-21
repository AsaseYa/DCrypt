const textInputGapLabel = document.querySelector('.text-input-gap-label');
const textTranslatedGapLabel = document.querySelector('.text-translated-gap-label');

const textInputGapValue = document.querySelector('.text-input-gap-value');
const textTranslatedGapValue = document.querySelector('.text-translated-gap-value');

const gapNumberSlider = document.querySelector('.gap-number-slider');

function modifyGap() {
    textInputGapLabel.innerHTML = gapNumberSlider.value;
    textTranslatedGapLabel.innerHTML = -gapNumberSlider.value;
    textInputGapValue.value = gapNumberSlider.value;
    textTranslatedGapValue.value = -gapNumberSlider.value;

    console.log(textInputGapValue.value);
}

textInputGapLabel.innerHTML = gapNumberSlider.value;
textTranslatedGapLabel.innerHTML = -gapNumberSlider.value;
gapNumberSlider.addEventListener('input', modifyGap)


/*
const writeValues = () => {
    textInputGapValue.value = gapNumberSlider.value;
    textTranslatedGapValue.value = -gapNumberSlider.value;
}

setInterval(writeValues, 1000);*/
