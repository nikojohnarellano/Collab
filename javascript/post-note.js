var courses = {
  "Term 1" : [
    "Business in a Networked Economy",
    "Business Communications 1",
    "CST Program Fundamentals",
    "Essential Skills for Computing",
    "Applied Mathematics",
    "Programming Methods",
    "Intro to Web Development"
  ],

  "Term 2" : [
    "Business Communications 2",
    "Discrete Mathematics",
    "Procedural Programming in C",
    "Object-Oriented Programming with Java",
    "Relational Database Systems",
    "Computer Organization/Architecture"
  ],

  "Term 3" : [
    "Object-Oriented Programming in C++",
    "Object Oriented Analysis and Design",
    "Introduction to Data Communications",
    "Algorithm Analysis and Design",
    "Mobile Application Development with Android",
    "Server-side web Scripting with PHP",
    "Database Systems 1",
    "Selected Topics in Database Systems",
    "Client/Server Computing 1",
    "Cloud Computing Platforms",
    "Data Communications/Internetworking 1",
    "Programming Windows",
    "Digital Image",
    "Technical Programming 1",
    "Information Technology Management"
  ],

  "Term 4" : [
    "Computers and the Law",
    "Operating Systems",
    "Introduction to Internet Software Development",
    "Computer Graphics for Computer Systems Technology",
    "Web Applicaton with ASP.NET",
    "iOS Application Development for iPhone and iPad",
    "Database Systems 2",
    "Special Topics in Client/Server",
    "DevOps Engineering (Cloud)",
    "Programming in the Cloud",
    "Data Communications/Internetworking 2",
    "Selected Topics in Data Communications/Internetworking",
    "Advanced Topics in Digital Processing",
    "Gaming Systems",
    "Technical Programming 2",
    "System Programming",
    "Intranet Planning and Development",
    "Managing IS Development",
    "Special Topics in MIS"
  ]
};


$.each(Object.keys(courses), function (i, item) {
    $('#term-select').append($('<option>', {
        value: item,
        text : item
    }));
});

var populateCourses =  function() {
  var sel = document.getElementById("term-select");
  var opt = sel.options[sel.selectedIndex].value;

    $('#course-select').find('option').remove().end();
    $('#course-select').append($('<option>', {
        value: "",
        text : "All Courses",
    }));
    $.each(courses[opt], function (i, item) {
      $('#course-select').append($('<option>', {
          value: item,
          text : item
      }));
  });
}
