"use strict";

const selectEl = document.getElementById("productType");
const deleteBtn = document.getElementById("delete-product-btn");

const showDesc = function () {
  // Remove show-desc class from all custom attribute fields (hiding them)
  const descs = document.querySelectorAll(".custom-attr");
  descs.forEach(function (el) {
    el.classList.remove("show-desc");
  });

  // Check the selected value
  let optionValue = selectEl.value;

  // If a valid option was chosen, show the corresponding attribute field & enable the custom input
  if (optionValue) {
    let selected = "custom-attr-" + optionValue;
    const desc = document.querySelector(`.${selected}`);
    desc.classList.add("show-desc");

    enableSizeInput(selected);
  }
};

const enableSizeInput = function (active) {
  const inputs = document.querySelectorAll("input[name*='size']");
  // Disable all size inputs
  inputs.forEach((el) => (el.disabled = true));

  // Enable only the selected option size inputs
  const toBeActivated = document.querySelectorAll(`.${active} input`);
  toBeActivated.forEach((el) => (el.disabled = false));
};

if (selectEl) {
  selectEl.addEventListener("change", showDesc);
}
if (deleteBtn) {
  deleteBtn.addEventListener("click", function () {
    const submitBtn = document.querySelector('input[type="submit"]');
    submitBtn.click();
  });
}
