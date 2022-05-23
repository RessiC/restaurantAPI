<?php

namespace App\Command;

use App\Entity\CustomerUser;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-customer-user';

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
            ->setDescription('Command for create customerUser')
            ->addArgument('email', InputArgument::REQUIRED, 'user email')
            ->addArgument('password', InputArgument::REQUIRED, 'User password');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Creating CustomerUser',
            '============'
        ]);

        $customerUser = new CustomerUser();
        $hashedPassword = $this->passwordHasher->hashPassword($customerUser, $input->getArgument('password'));
        $customerUser->setEmail($input->getArgument("email"));
        $customerUser->setPassword($hashedPassword);

        $entityManager = $this->manager->getManager();
        $entityManager->persist($customerUser);
        $entityManager->flush();

        $output->writeln('Successful you have created the user : ' . $customerUser->getEmail());

        return Command::SUCCESS;
    }

}