<?php

namespace App\Command;

use App\Entity\Order;
use App\Repository\User\CustomerUserRepository;
use App\Repository\User\UserRepository;
use App\Service\RestaurantService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateOrderCommand extends Command
{
    protected static $defaultName = 'app:create-order';

    private ManagerRegistry $manager;
    private UserPasswordHasherInterface $passwordHasher;
    private RestaurantService $restaurantService;
    private UserRepository $userRepository;

    public function __construct(ManagerRegistry $manager, UserPasswordHasherInterface $passwordHasher, RestaurantService $restaurantService, UserRepository $userRepository)
    {
        $this->manager = $manager;
        $this->passwordHasher = $passwordHasher;
        $this->restaurantService = $restaurantService;
        $this->userRepository = $userRepository;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Command for create order');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Creating CustomerUser',
        ]);

        $restaurant = $this->restaurantService->getRestaurant(3);
        $items = $restaurant->getItems();
        $user = $this->userRepository->findOneBy(['id' => 1]);

        $order = new Order();
        $order->setRestaurant($restaurant);
        $order->setUser($user);
        $order->setPrice(20);
        $order->setStatus('test');
        $order->setOrderAt(new \DateTime('now'));
        $order->addItem($items[2]);

        $entityManager = $this->manager->getManager();
        $entityManager->persist($order);
        $entityManager->flush();

        $output->writeln('Successful you have created order');

        return Command::SUCCESS;
    }

}