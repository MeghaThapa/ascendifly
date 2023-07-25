@extends('web.layouts.master')

@php
    $header = \App\Models\PageSetup::page('pricing');
@endphp
@if(isset($header))

    @section('title', $header->meta_title)

    @section('top_meta_tags')
    @if(isset($header->meta_description))
    <meta name="description" content="{!! str_limit(strip_tags($header->meta_description), 160, ' ...') !!}">
    @else
    <meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
    @endif

    @if(isset($header->meta_keywords))
    <meta name="keywords" content="{!! strip_tags($header->meta_keywords) !!}">
    @else
    <meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
    @endif
    @endsection

@endif

@section('content')

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap");

* {
  box-sizing: border-box;
}
.quiz_sec {
  background-color: #01539d;
  background-image: linear-gradient(315deg, #669900 0%, #cc3399 100%);
  font-family: "Poppins", sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 13rem 0;
}
.quiz-container {
  background-color: #eee;
  color: #990066;
  border-radius: 10px;
  box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
  width: 600px;
  overflow: hidden;
}
.quiz-header {
  padding: 2rem;
}
.quiz_add {
  padding: 3rem;
  line-height: 1.7;
  font-size: 1.3rem;
  font-weight: 500;
  text-align: center;
}

h2 {
    font-weight: 600;
    font-size: clamp(1.3rem,2vw, 1.5rem);
    padding: 1rem;
    text-align: left;
    margin: 0;
}

ul {
  list-style-type: none;
  padding: 0;
}
ul li {
  font-size: 1.1rem;
  margin: 1rem 0;
}
ul li label {
  cursor: pointer;
}
button {
  background-color: #ff9900;
  color: #fff;
  border: none;
  display: block;
  width: 100%;
  cursor: pointer;
  font-size: 1.4rem;
  font-weight: 500;
  font-family: inherit;
  padding: 1.3rem;
  transition: all 0.3s ease-in-out;
}
button:hover {
  background-color: #ff6600;
}
button:focus {
  outline: none;
  background-color: #ff6600;
}

</style>
<section class="quiz_sec">

<div class="quiz-container" id="quiz">
    <div class="quiz-header">
      <h2 id="question">Question Text</h2>
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="a_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="b_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="c_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="d" class="answer">
          <label for="d" id="d_text">Answer</label>
        </li>

      </ul>
    </div>

    <button id="submit">Submit</button>

  </div>
  </section>

<script>
    const quizData = [
  {
    question: "Define your way of building relationships with customers.?",
    a: "I'm confident and ambitious.",
    b: "I'm nice and friendly.",
    c: "I use storytelling and other influential techniques.",
    d: "I develop many logical reasons which will create a good relationship.",
  },
  {
    question: "What approach do you take when selling a product?",
    a: "Create a sense of urgency and need.",
    b: "Develop strong relationships and trust.",
    c: "Appeal to customers' emotions.",
    d: "Provide solutions that will meet customers' needs.",
  },
  {
    question: "Where do you see yourself in a team?",
    a: "As a leader",
    b: "As a Teammate",
    c: "As a motivator",
    d: "As an advisor",
  },
  {
    question: "How do you tolerate criticism?",
    a: "By being confident and defending my approach.",
    b: "By being kind and understanding their perspective.",
    c: "By using it as a motivation.",
    d: "By using it as feedback.",
  },
  {
    question: "How do you prioritise your tasks?",
    a: "By setting clear and ambitious goals.",
    b: "I develop a strong sense of trust with the customers.",
    c: "By focusing on the needs of the customers.",
    d: "By using data and logic to make decisions.",
  },
  {
    question: "How do you deal with competition?",
    a: "Being straight and adapting my procedure.",
    b: "Building relationships and trust.",
    c: "Being definitive and standing out.",
    d: "Being analytical and understanding the market.",
  },
  {
    question: " How do you handle the pressure?",
    a: "Being confident and taking control.",
    b: "Being easygoing and seeking support.",
    c: "Being expressive and finding motivation.",
    d: "Being rational and finding a solution.",
  },
  {
    question: "How do you handle rejection?",
    a: "Being positive and moving on.",
    b: "Being friendly and understanding the reason.",
    c: " Finding a new approach.",
    d: "Being analytic and uncovering an answer.",
  },
  {
    question: "What motivates you?",
    a: "Achieving my objectives and being successful.",
    b: "Building relationships and helping others.",
    c: "Expressing myself and trying new things.",
    d: "Discovering and understanding new information.",
  },
  {
    question: "When it comes to taking risks, how do you feel?",
    a: "I am willing to take risks in order to achieve my goals.",
    b: "I choose to play it safe and avoid unnecessary risks.",
    c: "I am ready to take the risk if it means trying new things.",
    d: "I consider the pros and cons before making a decision.",
  },
  {
    question: "How do you like to spend your free time?",
    a: "I enjoy being active and trying new things.",
    b: "I like to spend time with my friends and family.",
    c: "I like expressing myself through my different hobbies.",
    d: "I like to study and learn new things.",
  },
  {
    question: " How do you feel about taking on new responsibilities?",
    a: "I am excited to take on new challenges and prove myself.",
    b: "I am ready to help out but I like to stick to what I know.",
    c: "I am always ready for new opportunities, as long as they allow me to express myself.",
    d: " I am ready to take on new responsibilities, but only if I have the necessary information and knowledge.",
  },
  {
    question: " What is your preferred method of communication?",
    a: "I like to be direct and straight to the point.",
    b: " I like to be friendly and build good relationships.",
    c: "I like to express myself through gestures and facial expressions.",
    d: "I like to communicate through logical arguments and data.",
  },
  {
    question: "How do you make a decision?",
    a: " I make quick, strong decisions.",
    b: "I consider the needs and opinions of others.",
    c: " I express my own ideas and feelings before making a decision.",
    d: " I collect logical information and research it before making a decision.",
  },
  {
    question: "When faced with a problem, how do you generally respond?",
    a: "I take charge and come up with a strong plan of action.",
    b: " I try to find an agreement that will make everyone happy.",
    c: "I express my opinions and thoughts openly and honestly.",
    d: "I carefully examine the situation before making a decision.",
  },
];

console.log(quizData.length);

const quiz = document.getElementById("quiz");
const answerEls = document.querySelectorAll(".answer");
const questionEl = document.getElementById("question");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const c_text = document.getElementById("c_text");
const d_text = document.getElementById("d_text");
const submitBtn = document.getElementById("submit");
let calcA = [];
let calcB = [];
let calcC = [];
let calcD = [];

let currentQuiz = 0;

loadQuiz();

function loadQuiz() {
  deselectAnswers();

  const currentQuizData = quizData[currentQuiz];

  questionEl.innerText = currentQuizData.question;
  a_text.innerText = currentQuizData.a;
  b_text.innerText = currentQuizData.b;
  c_text.innerText = currentQuizData.c;
  d_text.innerText = currentQuizData.d;
}

function deselectAnswers() {
  answerEls.forEach((answerEl) => (answerEl.checked = false));
}

function getSelected() {
  let answer;
  answerEls.forEach((answerEl) => {
    if (answerEl.checked) {
      answer = answerEl.id;

      if (answer === "a") {
        calcA.push(answer);
        console.log(calcA);
      } else if (answer === "b") {
        calcB.push(answer);
        console.log(calcB);
      } else if (answer === "c") {
        calcC.push(answer);
        console.log(calcC);
      } else if (answer === "d") {
        calcD.push(answer);
        console.log(calcB);
      }
    }
  });
  console.log(typeof answer);
  return answer;
}

submitBtn.addEventListener("click", () => {
  const answer = getSelected();
  if (answer) {
    currentQuiz++;

    if (currentQuiz < quizData.length) {
      loadQuiz();
    } else {
      const qlen = quizData.length;

      if ((calcA.length / qlen) * 100 >= 50) {
        quiz.classList.add("quiz_add");
        quiz.innerHTML = `IRONMAN PERSONALITY: Congratulations! You have an Ironman sales and marketing personality. You have an Assertive personality thus, you are confident, direct and ambitious. An assertive personality can be defined as someone who is a confident, and self-assured individual. You clearly and effectively share your wants, needs, and limits, while also respecting those of others. You can assert yourself respectfully and effectively, without being aggressive or passive. A suitable industry for an Ironman personality in sales and marketing can be Technology, Finance, Consulting, Real Estate, Pharmaceuticals Sales, Automotive, Telecommunications, and Business-to-business (B2B) Sales and Marketing.
            <button onclick="location.reload()">Reload</button>`;
      } else if ((calcB.length / qlen) * 100 >= 50) {
        quiz.classList.add("quiz_add");
        quiz.innerHTML = `SUPERMAN PERSONALITY: Congratulations! You have a Superman sales and marketing personality. You have an Amiable personality thus, you are diplomatic, friendly and Sociable. An Amiable personality can be defined as someone who prioritises building and nurturing relationships. You excel in roles that require exceptional customer service, rapport building, and teamwork. Amiable salespeople are known for their ability to create a pleasant and harmonious atmosphere, making customers and clients feel valued and appreciated. Industries that align well with an Amiable sales personality include Hospitality and Tourism, Customer Service, Non-profit Organisations, Education and Training, Healthcare and Wellness, Event Planning, and Social Media Management.

            <button onclick="location.reload()">Reload</button>`;
      } else if ((calcC.length / qlen) * 100 >= 50) {
        quiz.classList.add("quiz_add");
        quiz.innerHTML = `SPIDERMAN PERSONALITY: Congratulations! You have a Spiderman personality in sales and marketing. You have an Expressive personality and you are charismatic, enthusiastic and frank.  An expressive personality can be defined as someone who is a highly emotive and outgoing individual. You are comfortable expressing your thoughts, feelings, and ideas openly and candidly. You are often seen as enthusiastic, talkative, and sociable, and you have a strong desire to connect with others and share your experiences.  A suitable industry for a Spiderman personality in sales and marketing can be in Entertainment, Creative Fields (e.g. advertising, graphic design, fashion), Public Relations, Social Media Marketing, Media and Journalism, Event Planning and Coordination, Public Speaking and Professional Training, Beauty and Fashion Marketing, Travel and Tourism Marketing.
            <button onclick="location.reload()">Reload</button>`;
      } else if ((calcD.length / qlen) * 100 >= 50) {
        quiz.classList.add("quiz_add");
        quiz.innerHTML = `BATMAN PERSONALITY: Congratulations! You have a Batman personality in sales and marketing. You have an Analytical personality. You are logical, methodical and analytical. An analytical personality can be defined as systematic, logical and objective in their thinking, approach and decision-making. You tend to be questioning, critical and objective and often rely on facts, data and evidence to make sense of the world. You are often seen as detail-oriented, curious and reflective. A suitable industry for a Batman personality in sales and marketing can be Data Analysis and Market Research, Technology and Software Sales and Marketing, Consulting, Pharmaceuticals Sales, Energy Marketing, and Business-to-business (B2B) Sales and Marketing.
            <button onclick="location.reload()">Reload</button>`;
      }
    }
  }
});

</script>

@endsection
<!--<script src="{{ asset('web/js/quizScript.js') }}"></script>-->