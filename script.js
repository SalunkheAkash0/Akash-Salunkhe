var h3 = document.querySelector("h3");
var color1 = document.querySelector(".color1");
var color2 = document.querySelector(".color2");
var body = document.querySelector("body");

function setGradient()
{
  body.style.background = "linear-gradient(to right, " + color1.value + " , " + color2.value + ")"
  h3.textContent = body.style.background + ";";
}

//We are calling setGradient function without parenthesis because if we call it with parenthesis it will run once but we want to change everytime when we drag colorpicker colors so we do not use parenthesis and let inputevent call function everytime the color is changed

color1.addEventListener("input", setGradient);

color2.addEventListener("input", setGradient);
