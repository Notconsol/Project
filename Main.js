$(function() {
  $(window).scroll(function() {
    if ($(this).scrollTop() != 0 && $(window).width() > 768) {
      $('#toTop').fadeIn();
    } else {
      $('#toTop').fadeOut();
    }
  });

  $('#toTop').click(function() {
    $('body,html').animate({scrollTop: 0}, 800);
  });
});

//Slider

const prev = document.getElementById('btn-prev'),
      next = document.getElementById('btn-next'),
      slides = document.querySelectorAll('.slide'),
      dots = document.querySelectorAll('.dot');

let index = 0;

const activeSlide = n => {
  for(slide of slides) {
    slide.classList.remove('active');
  }
  slides[n].classList.add('active');
};

const activeDot = n => {
  for(dot of dots) {
    dot.classList.remove('active');
  }
  dots[n].classList.add('active');
};

const prepareCurrentSlide = ind => {
  activeSlide(index);
  activeDot(index);
};

const nextSlide = () => {
  if(index == slides.length - 1 ){
    index = 0;
    prepareCurrentSlide(index);
  } else {
    index++
    prepareCurrentSlide(index)
  }
};

const prevSlide = () => {
  if(index == 0){
    index = slides.length - 1;
    prepareCurrentSlide(index);
  } else {
    index--
    prepareCurrentSlide(index);
  }
};

dots.forEach((item, indexDot)=>{
  item.addEventListener('click', () => {
    index = indexDot;
    prepareCurrentSlide(index);
  })
});

let timer = setInterval( () => {
  if(index == slides.length - 1){
    index = 0;
    prepareCurrentSlide(index);
  } else {
    index++
    prepareCurrentSlide(index);
  }  
},5000);

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

