const plusButton = document.querySelector('#plus');
const minusButton = document.querySelector('#minus');
const quantityInput = document.querySelector('#qnt2');
const stock = document.querySelector('#stock').value;

plusButton.addEventListener('click', () => {
  const newValue = parseInt(quantityInput.value, 10) + 1;
  if (newValue <= stock) {
    quantityInput.value = newValue;
  }
});
minusButton.addEventListener('click', () => {
  const newValue = parseInt(quantityInput.value, 10) - 1;
  if (newValue >= 0) {
    quantityInput.value = newValue;
  }
});