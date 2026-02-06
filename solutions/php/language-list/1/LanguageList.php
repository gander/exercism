<?php
declare(strict_types=1);

function language_list(string ...$args): array
{
    return $args;
}

function add_to_language_list(array $language_list, string $language): array {
    return [...$language_list, $language];
}

function prune_language_list(array $language_list): array {
    return array_slice($language_list, 1);
}

function current_language(array $language_list): string|false
{
    return current($language_list);
}

function language_list_length(array $language_list): int
{
    return count($language_list);
}