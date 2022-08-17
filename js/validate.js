"use strict";

const form = document.getElementById("product_form");
const saveBtn = document.querySelector(".btn-save");

saveBtn.addEventListener("click", function () {
  const submitBtn = document.querySelector('input[type="submit"]');
  submitBtn.click();
});

if (form) {
  document.addEventListener("DOMContentLoaded", () => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const sku = document.getElementById("sku").value;
      const name = document.getElementById("name").value;
      const price = document.getElementById("price").value;
      const type = document.getElementById("productType").value;
      const size = document.getElementById("size").value;
      const weight = document.getElementById("weight").value;
      const height = document.getElementById("height").value;
      const width = document.getElementById("width").value;
      const length = document.getElementById("length").value;

      const params = `sku=${sku}&name=${name}&price=${price}&type=${type}&size=${size}&weight=${weight}&height=${height}&width=${width}&length=${length}`;
      const xhr = new XMLHttpRequest();

      xhr.open("POST", "includes/create.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function () {
        if (this.status == 200) {
          const res = this.responseText;
          const obj = JSON.parse(res);

          document.querySelector("#sku + .form__warning").innerHTML = obj.sku
            ? `<span>${obj.sku}</span>`
            : "";
          document.querySelector("#name + .form__warning").innerHTML = obj.name
            ? `<span>${obj.name}</span>`
            : "";
          document.querySelector("#price + .form__warning").innerHTML =
            obj.price ? `<span>${obj.price}</span>` : "";
          document.querySelector("#productType + .form__warning").innerHTML =
            obj.type ? `<span>${obj.type}</span>` : "";
          document.querySelector("#size + .form__warning").innerHTML = obj.size
            ? `<span>${obj.size}</span>`
            : "";
          document.querySelector("#weight + .form__warning").innerHTML =
            obj.weight ? `<span>${obj.weight}</span>` : "";
          document.querySelector("#height + .form__warning").innerHTML =
            obj.height ? `<span>${obj.height}</span>` : "";
          document.querySelector("#width + .form__warning").innerHTML =
            obj.width ? `<span>${obj.width}</span>` : "";
          document.querySelector("#length + .form__warning").innerHTML =
            obj.length ? `<span>${obj.length}</span>` : "";

          if (res == "[]") {
            window.location = "index.php";
          }
        }
      };
      xhr.send(params);
    });
  });
}
