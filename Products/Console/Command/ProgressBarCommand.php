<?php

namespace Devall\Products\Console\Command;

use Magento\Directory\Model\ResourceModel\Country\CollectionFactory;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\ProgressBarFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProgressBarCommand extends Command
{
    /**
     * @var ProgressBarFactory
     */
    private $progressBarFactory;

    /**
     * @var CollectionFactory
     */
    private $countryCollectionFactory;

    /**
     * @inheritDoc
     */
    public function __construct(
        ProgressBarFactory $progressBarFactory,
        CollectionFactory $countryCollectionFactory,
        string $name
    ) {
        $this->progressBarFactory = $progressBarFactory;
        $this->countryCollectionFactory = $countryCollectionFactory;

        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setDescription('Add Products console command with progress bar.');

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Process starts.</info>');

        $countries = $this->countryCollectionFactory->create()->getItems();
        /** @var ProgressBar $progress */
        $progressBar = $this->progressBarFactory->create(
            [
                'output' => $output,
                'max' => count($countries),
            ]
        );

        $progressBar->setFormat(
            '%current%/%max% [%bar%] %percent:3s%% %elapsed% %memory:6s%'
        );

        $progressBar->start();

        foreach ($countries as $country) {
            $progressBar->advance();
        }

        $progressBar->finish();
        $output->write(PHP_EOL);
        $output->writeln('<info>Process finished.</info>');

        return Cli::RETURN_SUCCESS;
    }
}
