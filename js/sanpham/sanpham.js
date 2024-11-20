document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const mama = this.getAttribute('data-mama');
            const tenma = this.getAttribute('data-tenma');
            const hinhanh = this.getAttribute('data-hinhanh');
            const giaban = this.getAttribute('data-giaban');

            document.getElementById('detailImage').src = `images/${hinhanh}`;
            document.getElementById('detailName').textContent = tenma;
            document.getElementById('detailPrice').textContent = `${parseInt(giaban).toLocaleString()} VND`;
            document.getElementById('mama').value = mama;
            document.getElementById('dongia').value = giaban;
            openProductDetails();
        });
    });

    document.getElementById('increase-btn').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantity-input');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    document.getElementById('decrease-btn').addEventListener('click', function() {
        const quantityInput = document.getElementById('quantity-input');
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});

function openProductDetails() {
    document.getElementById('productOverlay').style.display = 'block';
    document.getElementById('productDetailForm').style.display = 'block';
}

function closeProductDetails() {
    document.getElementById('productOverlay').style.display = 'none';
    document.getElementById('productDetailForm').style.display = 'none';
}

//banner list
var images = ["images/banner1.jpg", "images/banner4.jpg","images/banner2.jpg", "images/banner3.jpg"];
    var currentImageIndex = 0;
    
    function changeImage() {
      var banner = document.getElementsByClassName("background-header-img")[0];
      banner.src = images[currentImageIndex];
    
      var dots = document.getElementsByClassName("dots")[0];
      var dotSpans = dots.getElementsByTagName("span");
      for (var i = 0; i < dotSpans.length; i++) {
        dotSpans[i].classList.remove("active");
      }
      dotSpans[currentImageIndex].classList.add("active");
    
      currentImageIndex++;
      if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
      }
    }
    
    setInterval(changeImage, 2000);
    
    var dots = document.getElementsByClassName("dots")[0];
    for (var i = 0; i < images.length; i++) {
      var dot = document.createElement("span");
      dot.setAttribute("onclick", "currentImageIndex = " + i + "; changeImage();");
      dots.appendChild(dot);
    }
    
    var firstDot = dots.getElementsByTagName("span")[0];
    firstDot.classList.add("active");
//end
