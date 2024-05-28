<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $quiz
 */
?>

<?php
switch ($quiz->quiztype_id) {
    case 1 :
      echo $this->element('Quiz/text-options-view');
        break;
        case 2 :
            echo $this->element('Quiz/image-options-view');
              break;
          case 3 :
            echo $this->element('Quiz/true-false-view');
              break;
            case 4 :
                echo $this->element('Quiz/match-view');
                  break;
              case 5 :
                echo $this->element('Quiz/ordering-view');
                  break;
              case 6 :
                echo $this->element('Quiz/gaps-view');
                  break;
                  case 7 :
                    echo $this->element('Quiz/drop-down-view');
                      break;
                      case 8 :
                        echo $this->element('Quiz/base-matching-view');
                          break;
    
        default:
        # code...
        break;
}

?>