<?php

namespace App\Command;

use App\Service\CreateAdminService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Create a user with admin authorizations',
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private readonly CreateAdminService $createAdminService
    )
    {
        parent::__construct();
    }
    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to create an admin user or give admin rights to an existing user. Please enter email, user name and password in order. If the user already exists you can enter whatever you want for user name and password')
            ->addArgument('email', InputArgument::REQUIRED, 'User\'s email')
            ->addArgument('userName', InputArgument::REQUIRED, 'User\'s name')
            ->addArgument('password', InputArgument::REQUIRED, 'User\'s password');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $userName = $input->getArgument('userName');
        $password = $input->getArgument('password');

        $this->createAdminService->create($email, $userName, $password);

        $output->writeln([
            '',
            'Admin Creator',
            '============',
            '',
        ]);
        $output->writeln('User email: '.$email);
        $output->writeln('User name: '.$userName);
        $output->writeln('User password: '.$password);
        $io->success('Admin User has been created!');
        $io->warning('Don\'t forget to clear your console!');

        return Command::SUCCESS;
    }
}
