window.onload = function() {
  const creatorField = document.getElementById('creator_field');
  function isOriginalCreatorField() {
      if (document.getElementById('yes').checked) {
        creatorField.setAttribute("hidden", true);
      } else {
        creatorField.removeAttribute("hidden"); 
      }
  }

  const radioButtons = document.querySelectorAll('input[name="is_image_owner"]');
  radioButtons.forEach(radio => {
    radio.addEventListener('click', isOriginalCreatorField);
  }); 
};
