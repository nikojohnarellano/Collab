function prevent_default() {
  $(document).ready(function(e){
      $('.search-panel .dropdown-menu').find('a').click(function(e) {
  		e.preventDefault();
  		var param = $(this).attr("href").replace("#","");
  		var concept = $(this).text();
  		$('.search-panel span#search_concept').text(concept);
  		$('.input-group #search_param').val(param);
  	});
  });
}

function login_transition (element, location) {
  var element_id = '#' + element.id;

  $(element_id).fadeOut(1000, function() {
    window.location.href = location;
  });
}

function spinner_transition(element, location) {
    show_spinner();

    $(window).resize(function() {
      show_spinner();
    })

    setTimeout(function(){
      $('#page-content-wrapper').fadeOut('fast',function() {
        window.location.href = location;
      });
    }, 1500);

}

function show_spinner() {
  $('#categories-list').fadeOut();
  $('#spinner-img').fadeIn();
  var winW = $('#page-content-wrapper').width();
  var winH = $('#page-content-wrapper').height();

  $('#spinner img').css({
        'position' : 'absolute',
        'top' :  winH/2 - 50,
        'left': winW/2 - 50,
        'height': '100px',
        'width' : '100px'
  });
}

function fade_in_dashboard() {
  $('#dashboard').fadeIn('350');
}

function shake() {
  $(document).ready(function() {
    $("#login").effect( "shake", {times:4}, 500 );
  });
}
