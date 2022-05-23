<?php

namespace App\Command;

use App\Entity\ManagerUser;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateManagerUserCommand extends Command
{
    protected static $defaultName = 'app:create-manager-user';

    private ManagerRegistry $manager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(ManagerRegistry $manager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->manager = $manager;
        $this->passwordHasher = $passwordHasher;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Command for create managerUser')
            ->addArgument('email', InputArgument::REQUIRED, 'user email')
            ->addArgument('password', InputArgument::REQUIRED, 'User password');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Creating ManagerUser',
            '============'
        ]);

        $managerUser = new managerUser();
        $hashedPassword = $this->passwordHasher->hashPassword($managerUser, $input->getArgument('password'));
        $managerUser->setEmail($input->getArgument("email"));
        $managerUser->setPassword($hashedPassword);
        $managerUser->setRoles($managerUser::ROLE_MANAGER);

        $entityManager = $this->manager->getManager();
        $entityManager->persist($managerUser);
        $entityManager->flush();

        $output->writeln('Successful you have created the user : ' . $managerUser->getEmail());

        return Command::SUCCESS;
    }

}