<?php

declare(strict_types=1);

class Tournament
{
    private const array STATS_TPL = ['m' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'p' => 0];

    public function tally(string $csv): string
    {
        $teams = [];

        foreach ($this->extract($csv) as [$team1, $team2, $result]) {
            $teams[$team1] ??= self::STATS_TPL;
            $teams[$team2] ??= self::STATS_TPL;

            $teams[$team1]['m'] += 1;
            $teams[$team2]['m'] += 1;

            switch ($result) {
                case 'draw':
                    $teams[$team1]['d'] += 1;
                    $teams[$team2]['d'] += 1;
                    $teams[$team1]['p'] += 1;
                    $teams[$team2]['p'] += 1;
                    break;
                case 'win':
                    $teams[$team1]['w'] += 1;
                    $teams[$team2]['l'] += 1;
                    $teams[$team1]['p'] += 3;
                    break;
                case 'loss':
                    $teams[$team2]['w'] += 1;
                    $teams[$team1]['l'] += 1;
                    $teams[$team2]['p'] += 3;
                    break;
            }
        }

        uksort($teams, function ($a, $b) use ($teams) {
            $result = $teams[$b]['p'] <=> $teams[$a]['p'];
            return $result === 0 ? $a <=> $b : $result;
        });

        $output[] = implode(' | ', [
            str_pad('Team', 30, ' ', STR_PAD_RIGHT),
            str_pad('MP', 2, ' ', STR_PAD_LEFT),
            str_pad('W', 2, ' ', STR_PAD_LEFT),
            str_pad('D', 2, ' ', STR_PAD_LEFT),
            str_pad('L', 2, ' ', STR_PAD_LEFT),
            str_pad('P', 2, ' ', STR_PAD_LEFT),
        ]);
        foreach ($teams as $team => $stats) {
            $output[] = implode(' | ', [
                str_pad($team, 30),
                str_pad((string)$stats['m'], 2, ' ', STR_PAD_LEFT),
                str_pad((string)$stats['w'], 2, ' ', STR_PAD_LEFT),
                str_pad((string)$stats['d'], 2, ' ', STR_PAD_LEFT),
                str_pad((string)$stats['l'], 2, ' ', STR_PAD_LEFT),
                str_pad((string)$stats['p'], 2, ' ', STR_PAD_LEFT),
            ]);
        }

        return implode(PHP_EOL, $output);
    }

    public function extract(string $csv): array
    {
        return array_filter(
            array_map(
                fn($row) => explode(";", $row),
                array_filter(
                    explode("\n", $csv)
                )
            )
        );
    }
}
