//chick if there's Local storge color option
let mainColor = localStorage.getItem("color_option")
if(mainColor !== null) {
    //check if this in local storage
    document.documentElement.style.setProperty("--main-color", mainColor)
    //check if the aactive class is avaleble
    document.querySelectorAll(".color-list li").forEach(element => {
        element.classList.remove("active")
        //add active class on element with data-color === localstorage item
        if (element.dataset.color === mainColor) {
            //add class 
            element.classList.add("active")
        }
    });
}

//random background imgs option 
let randombackground = true;
//varibale to control background intreval
let backgroundInterval;

let backgroundlocalItem = localStorage.getItem('background_option')
if(backgroundlocalItem !== null) {
 if(randombackground === 'true'){
    randombackground = true;
 }else{
    randombackground = false;
 }
 function setInitialClass() {
    var heartIcon = document.getElementById('heartIcon');
    var heartState = localStorage.getItem('heartState');
    if (heartState === 'filled') {
        heartIcon.classList.add('heart-filled');
    } else {
        heartIcon.classList.add('heart');
    }
}

// Call setInitialClass function when the page loads
document.addEventListener('DOMContentLoaded', setInitialClass);

    let removeClassActive = document.querySelectorAll(".random-background span")
    removeClassActive.forEach(element => {
    element.classList.remove("active")
 });
 if(backgroundlocalItem === "true"){
    document.querySelector(".yes").classList.add('active')
 }else{
    document.querySelector(".no").classList.remove('active')
    
 }
}
// end randm img option

//toogle spin class on Icon
let boody = document.querySelector("body");
let toggleC =  document.querySelector(".toggle-setting .fa-gear");
let optionM =  document.querySelector(".seting-box");
toggleC.onclick = function () {
    //toggle to Add spin class
    this.classList.toggle("fa-spin")
    // this to add class is named open, to open menu 
    optionM.classList.toggle("open")
};



// switch colors
const colorLi = document.querySelectorAll(".color-list li")
//loop for all list item
colorLi.forEach(li => {
    li.addEventListener("click" , (e) => {
        // set color on root
        document.documentElement.style.setProperty("--main-color", e.target.dataset.color)
        // set data in Local storge 
        localStorage.setItem("color_option", e.target.dataset.color)
        //remove class active from all element 
        let chooseColor = e.target.parentElement.querySelectorAll(".active");
        chooseColor.forEach(element => {
        element.classList.remove("active")
    });
    e.target.classList.add("active")
 });
});


// switch random background option
const imgBackEl = document.querySelectorAll(".random-background span");
//loop on span
imgBackEl.forEach(span => {
 span.addEventListener("click" , (e) => {
    //remove class active from all element 
    e.target.parentElement.querySelectorAll(".active").forEach(element => {
        element.classList.remove("active")
    });
    e.target.classList.add("active")

    if(e.target.dataset.background === 'yes'){
        randombackground = true;

        randomaize()

        localStorage.setItem('background_option', true)
    }else{
        randombackground = false

        clearInterval(backgroundInterval)

        localStorage.setItem('background_option', false)

    }

 });
});


// landing page
let landingPage = document.querySelector(".landing-page")
// insert images into arraay 
// let imgsArray = ["../img/1.jpg" , "../img/2.jpg" ,"../img/3.jpg" ,"../img/4.jpg", "../img/5.jpg"]


// function to randomaize imgs
function randomaize () {
    if(randombackground === true){
// this funcation change photos every 10 sec
 backgroundInterval = setInterval (() => {
    //get random number 
    let randomNumber = Math.floor(Math.random() * imgsArray.length);
    //change background img url
    landingPage.style.backgroundImage = " url('" + imgsArray[randomNumber]  + "')";
}, 1000)
    }
};
// randomaize();

//skills 
let ourSkill = document.querySelector(".skills");
window.onscroll = function () {
    //siklls offaset top 
    let skillsOffsetTop = ourSkill.offsetTop;

    // skils offsetheight
    let skillsOffsetHeight  = ourSkill.offsetHeight;

    //inner height
    let skillsInnerHeight = this.innerHeight;
    //window scroll tiop
    let windoScrolltop = this.scrollY
    if (windoScrolltop > (skillsOffsetTop + skillsOffsetHeight - skillsInnerHeight)){
        let allSkills  = document.querySelectorAll(".skill-box .skill-progrees span");
        allSkills.forEach(skill => {
                skill.style.width = skill.dataset.progrees;
        });
    }
};
let ourgallery = document.querySelectorAll(".gallery img");

ourgallery.forEach(img => {
    img.addEventListener('click', (e) =>{
        let overLay = document.createElement("div");
        // add claass name
        overLay.className ="popup-overlay";
        //append overlay to body
        document.body.append(overLay);
        //create popup box
        let popupBox = document.createElement("div");
        popupBox.className = "popup-box";
        if (img.alt !== null){
            let imgHiding = document.createElement("h3")

            let imgText = document.createTextNode(img.alt)

            imgHiding.appendChild(imgText)
            popupBox.appendChild(imgHiding)
        
        }
        
        //create popup img
        let popupImg = document.createElement("img");
        //set img source
        popupImg.src = img.src;
        //append the popup box to body
        popupBox.appendChild(popupImg);
        // add popup to body
            document.body.appendChild(popupBox);

            //create close button 
            let closeButtonspan = document.createElement("span");

            //create the icon close 
            let closeButtonicon = document.createTextNode("X");

            
            //add icon element to span
            closeButtonspan.appendChild(closeButtonicon)

            //create class name to icon
            closeButtonspan.className = "close-button";  

            //add close button to popup box
            popupBox.appendChild(closeButtonspan)
            // if (e.target.className == 'popup-overlay'){    
            //     e.target.nextSibling.remove();
            //     e.target.remove(); 
            //    } 
        });
    });

    //close popup 

    document.addEventListener("click", function (e){
        if (e.target.className == "close-button"){
            // removethe current popup
            e.target.parentNode.remove()
            //remove overlay
            document.querySelector('.popup-overlay').remove()
        }
           if (e.target.className == 'popup-overlay'){    
                e.target.nextSibling.remove();
                e.target.remove(); 
               } 
    })

    //toggle menu 
    let toggleBtn = document.querySelector(".toggle-menu")
    let tLinkis = document.querySelector(".links")
    toggleBtn.onclick = function (e) {
        e.stopPropagation()
        this.classList.toggle("menu-active")
        tLinkis.classList.toggle("open") 
    }
    //click anywhere Outside
    document.addEventListener("click", (e) => {
        if(e.target !== toggleBtn && e.target !== tLinkis){
            if (tLinkis.classList.contains("open"))
            toggleBtn.classList.remove("menu-active")
            tLinkis.classList.remove("open")
        }
    })
    //stop propagnda
    tLinkis.onclick = function (e){
        e.stopPropagation()
    }

// for uaser
        //toggle menu for user session
        let dropM = document.querySelector(".drop-about")
        let clickD = document.querySelector(".clickD")
        clickD.onclick = function (e) {
            e.stopPropagation()
            this.classList.toggle("drop-menu")
            dropM.classList.toggle("opened") 
        }
        //click anywhere Outside 
        document.addEventListener("click", (e) => {
            if(e.target !== clickD && e.target !== dropM){
                if (tLinkis.classList.contains("opened"))
                clickD.classList.remove("drop-menu")
                dropM.classList.remove("opened")
            }
        })
        //stop propagnda
        dropM.onclick = function (e){
            e.stopPropagation()
        }
        // end user

        // start header scroll 
        // const header  = document.querySelectorAll('header .header-area');
        // window.addEventListener ("scroll" , function (){
        //     header.classList.toggle("sticky", this.window.scrollY > 0);
        // })
        // haert in page apartement
        function changeClass(element) {
            // Toggle between classes heart and heart-filled
            element.classList.toggle('heart');
            element.classList.toggle('heart-filled');
            // Save the state (class) of the heart icon to localStorage
            var isFilled = element.classList.contains('heart-filled');
            localStorage.setItem('heartState', isFilled ? 'filled' : 'empty');
        }

                // Function to set initial class based on localStorage when the page loads

// page job
document.getElementById('POJ').addEventListener('change', function() {
    var jobId = this.value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('jobDetails').innerHTML = this.responseText;
      }
    };
    xhr.open('GET', 'get_job_details.php?jobId=' + jobId, true);
    xhr.send();
  });


// JavaScript code to fetch and display job details dynamically

document.addEventListener("DOMContentLoaded", function() {
    const jobNameSelect = document.getElementById("jopName");
    const jobDescElement = document.getElementById("jobDesc");
  
    jobNameSelect.addEventListener("change", function() {
      const selectedJob = jobNameSelect.value;
  
      // Fetch job details based on the selected job name
      fetchJobDetails(selectedJob);
    });
  
    function fetchJobDetails(jobName) {
      // Here you would make an AJAX request to fetch job details from your database
      // For demonstration purposes, I'll use mock data
  
      // Mock data for job details
      const jobDetails = {
        "call center": {
          description: "We are looking for energetic individuals to join our call center team.",
          salary: "Salary: 6000 per month",
          requirements: "Requirements: Fluent in English, able to work 8 hours per day"
        },
        "delivery": {
          description: "Join our delivery team and help us deliver exceptional service to our customers.",
          salary: "Salary: 6000 per month",
          requirements: "Requirements: Valid driver's license, ability to lift packages"
        },
        "designer": {
          description: "Are you a creative designer? Join us to work on exciting projects.",
          salary: "Salary: 6000 per month",
          requirements: "Requirements: Proficient in design software, creative thinking"
        },
        "account manager": {
          description: "Join our team as an account manager and help us manage client accounts.",
          salary: "Salary: 6000 per month",
          requirements: "Requirements: Experience in account management, excellent communication skills"
        }
      };
  
      // Update the job description based on the selected job
      const job = jobDetails[jobName];
      if (job) {
        jobDescElement.innerHTML = `
          <h3>${jobName}</h3>
          <p>${job.description}</p>
          <p>${job.salary}</p>
          <p>${job.requirements}</p>
        `;
      } else {
        jobDescElement.textContent = "Job details not found.";
      }
    }
  });
  