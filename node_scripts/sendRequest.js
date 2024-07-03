const axios = require('axios');

const apiUrlAssistant = 'http://localhost:8765/api/assistant/get-response';
const apiUrlQuiz = 'http://localhost:8765/api/quiz/check-answer';

// Function to call the English teaching assistant
const callAssistant = async (prompt) => {
    try {
        const response = await axios.post(apiUrlAssistant, { prompt });
        console.log('Assistant Response:', response.data.response);
    } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
    }
};

// Function to call the quiz checker
const checkQuizAnswer = async (question, userAnswer) => {
    try {
        const response = await axios.post(apiUrlQuiz, { question, user_answer: userAnswer });
        console.log('Quiz Response:', response.data.response);
    } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
    }
};

// Example calls
callAssistant('What are the basic principles of English grammar?');
checkQuizAnswer('What is the capital of France?', 'Berlin');
