<?php

namespace App;
use App\RandomUserCreater;
use App\RandomDataGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class CreateUserCommand extends Command
{

    public function __construct($name = null)
    {
        parent::__construct($name);
    }

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-user';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...');


    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $question = new Question('Please enter names wih space  : ');
        $helper = $this->getHelper('question');
        $names = $helper->ask($input, $output, $question);
        $question = new Question('Please enter surnames wih space  : ');
        $helper = $this->getHelper('question');
        $surnames = $helper->ask($input, $output, $question);
        $names = explode(' ',$names);
        $surnames = explode(' ',$surnames);
        $random = new RandomDataGenerator();
        $emails = $random->generateRandomEmails();
        $passwords = $random->generateRandomPasswords();
        $userCreater = new RandomUserCreater($names,$surnames,$emails,$passwords);
        $users = $userCreater->getUsers();
        $excel = new ExportAsExcel();
        $excel->export($users);
    }
}