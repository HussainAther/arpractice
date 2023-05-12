public class QuizScript : MonoBehaviour {

    public List<string> questions;
    public List<string[]> answers;
    public int score;

    private int currentQuestion = 0;

    // Start is called before the first frame update
    void Start() {
        DisplayQuestion(currentQuestion);
    }

    // Update is called once per frame
    void Update() {
        // Check for user input and handle quiz interaction
    }

    void DisplayQuestion(int questionIndex) {
        // Display the current question and its possible answers
    }

    bool CheckAnswer(int questionIndex, int answerIndex) {
        // Check if the selected answer is correct
    }

    void ShowResult() {
        // Display the user's score and any additional feedback
    }

}

