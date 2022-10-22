<?php

namespace Devall\Products\Console\Command;

use Devall\Products\Api\ProductsRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\ProgressBarFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Devall\Products\Model\ProductsFactory;
use Symfony\Component\Console\Input\InputOption;

class AddProducts extends Command
{
    /**
     * @var ProductsFactory
     */
    private ProductsFactory $productsFactory;

    /**
     * @var ProductsRepositoryInterface
     */
    private ProductsRepositoryInterface $productsRepository;

    /**
     * @var ProgressBarFactory
     */
    private ProgressBarFactory $progressBarFactory;

    /**
     * @param ProductsFactory $productsFactory
     * @param ProgressBarFactory $progressBarFactory
     * @param ProductsRepositoryInterface $productsRepository
     * @param string|null $name
     */
    public function __construct(
        ProductsFactory $productsFactory,
        ProgressBarFactory $progressBarFactory,
        ProductsRepositoryInterface $productsRepository,
        string $name = null
    ) {
        parent::__construct($name);
        $this->productsFactory = $productsFactory;
        $this->progressBarFactory = $progressBarFactory;
        $this->productsRepository = $productsRepository;
    }

    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('add:products');
        $this->setDescription('adds products to product table');
        $this->addOption(
            'name',
            null,
            InputOption::VALUE_REQUIRED,
            'Name'
        );
        $this->addOption(
            'price',
            null,
            InputOption::VALUE_REQUIRED,
            'Cost of the products'
        );
        $this->addOption(
            'description',
            null,
            InputOption::VALUE_REQUIRED,
            'Description of the products'
        );
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln('<info>Process starts.</info>');
        $name = $input->getOption('name');
        $price = $input->getOption('price');
        $description = $input->getOption('description');
        $product = $this->productsFactory->create();

        /** @var ProgressBar $progress */
        $progressBar = $this->progressBarFactory->create(
            [
                'output' => $output,
                'max' => 1,
            ]
        );
        $progressBar->setFormat(
            '%current%/%max% [%bar%] %percent:3s%% %elapsed% %memory:6s%'
        );
        $progressBar->start();

        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        $progressBar->advance();

        $this->productsRepository->save($product);
        $progressBar->finish();

        $output->writeln('<info>Your Product added successfully.</info>');
    }
}
