const coursesDropdown = document.getElementById("courses");
const dateDetailsDiv = document.getElementById("date-details");
const dateDetailsDropdown = document.getElementById("date-details-dropdown");
const dateDropdown = document.getElementById("date-details");
const timeDetailsDiv = document.getElementById("time-details");
const timeDetailsDropdown = document.getElementById("time-details-dropdown");

const course1Date1 = "10 Apr 2023";
const course1Date2 = "26 Apr 2023";
const course1Date3 = "12 May 2023";
const course1Date4 = "28 May 2023";
const course1Date5 = "13 June 2023";
const course1Date6 = "29 June 2023";

const course2Date1 = "10 April 2023";
const course2Date2 = "14 April 2023";
const course2Date3 = "18 April 2023";
const course2Date4 = "22 April 2023";
const course2Date5 = "26 April 2023";
const course2Date6 = "30 April 2023";
const course2Date7 = "04 May 2023";
const course2Date8 = "08 May 2023";




// Define options for each course
const courseOptions = {
  course1: ["Choose Date*", course1Date1,course1Date2,course1Date3,course1Date4,course1Date5,course1Date6],
  course2: ["Choose Date*", course2Date1, course2Date2, course2Date3, course2Date4, course2Date5, course2Date6, course2Date7, course2Date8],
  course3: ["Choose Date*", "Dates On Demand"],
};


const timeOptions = {
    "Choose Date*" : ["Choose Time*"],
    "10 Apr 2023" : ["4 PM Queensland Time"], "26 Apr 2023": ["4 PM Queensland Time"], "12 May 2023": ["4 PM Queensland Time"],
    "28 May 2023": ["4 PM Queensland Time"], "13 June 2023": ["4 PM Queensland Time"], "29 June 2023": ["4 PM Queensland Time"],

    
    "Choose Date*": ["Choose Time*"],
    "10 April 2023": ["6 PM Queensland Time"], "14 April 2023": ["6 PM Queensland Time"], "18 April 2023": ["6 PM Queensland Time"],
    "22 April 2023": ["6 PM Queensland Time"], "26 April 2023": ["6 PM Queensland Time"], "30 April 2023": ["6 PM Queensland Time"],
    "04 May 2023": ["6 PM Queensland Time"], "08 May 2023": ["6 PM Queensland Time"],

    "Choose Date*": ["Choose Time*"],
    "Dates On Demand" : ["7:30 PM Queensland Time"], 
  };

coursesDropdown.addEventListener("change", function () {
  // Get the selected course
  const selectedCourse = coursesDropdown.value;
  console.log(selectedCourse);

  

  // Clear the options in the course details dropdown
  dateDetailsDropdown.innerHTML = "";
  timeDetailsDropdown.innerHTML = "";

  // Set the options for the selected course
  if (selectedCourse) {
    const options = courseOptions[selectedCourse];
    options.forEach((option) => {
      const optionElement = document.createElement("option");
      optionElement.value = option;
      optionElement.textContent = option;
      dateDetailsDropdown.appendChild(optionElement);
    });
    dateDetailsDiv.style.display = "flex";
  } else {
    dateDetailsDiv.style.display = "none";
    timeDetailsDiv.style.display = "none";
  }
});

dateDetailsDropdown.addEventListener("change", function () {
    // Get the selected option
    const selectedOption = dateDetailsDropdown.value;
     
  
    // Clear the options in the selected option details dropdown
    //selectedOptionDetailsDropdown.innerHTML = "";
    timeDetailsDropdown.innerHTML = "";
    // Set the options for the selected option
    if (selectedOption) {
      const options = timeOptions[selectedOption];
      options.forEach((option) => {

        console.log(option);
        
          const optionElement = document.createElement("option");
          optionElement.value = option;
          optionElement.textContent = option;
          timeDetailsDropdown.appendChild(optionElement);
        });
        timeDetailsDiv.style.display = "flex";
      } else {
        timeDetailsDiv.style.display = "none";
      }
    });
