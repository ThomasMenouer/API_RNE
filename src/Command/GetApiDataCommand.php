<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\Facade;

#[AsCommand(
    name: 'app:get-data-entreprise',
    description: 'Get data from an entreprise',
)]
class GetApiDataCommand extends Command
{
    private Facade $facade;

    public function __construct(Facade $facade)
    {
        parent::__construct();
        $this->facade = $facade;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('siren', InputArgument::OPTIONAL, 'Siren')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $siren = $input->getArgument('siren');

        // Authentification
        $this->facade->authenticate();

        // Fetch data from API
        $entrepriseDto = $this->facade->getData($siren);

        //dd($entrepriseDto);

        // Save data to database
        $this->facade->saveData($entrepriseDto);

        $io->success('Data save in database');
        
        return Command::SUCCESS;
    }
}
