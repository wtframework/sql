<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Like
{

  protected string $like = '';
  protected array $like_options = [];

  public function like(string|HasBindings $table): static
  {

    $this->like = $table;

    return $this;

  }

  public function includingComments(): static
  {

    $this->like_options[] = 'INCLUDING COMMENTS';

    return $this;

  }

  public function excludingComments(): static
  {

    $this->like_options[] = 'EXCLUDING COMMENTS';

    return $this;

  }

  public function includingCompression(): static
  {

    $this->like_options[] = 'INCLUDING COMPRESSION';

    return $this;

  }

  public function excludingCompression(): static
  {

    $this->like_options[] = 'EXCLUDING COMPRESSION';

    return $this;

  }

  public function includingConstraints(): static
  {

    $this->like_options[] = 'INCLUDING CONSTRAINTS';

    return $this;

  }

  public function excludingConstraints(): static
  {

    $this->like_options[] = 'EXCLUDING CONSTRAINTS';

    return $this;

  }

  public function includingDefaults(): static
  {

    $this->like_options[] = 'INCLUDING DEFAULTS';

    return $this;

  }

  public function excludingDefaults(): static
  {

    $this->like_options[] = 'EXCLUDING DEFAULTS';

    return $this;

  }

  public function includingGenerated(): static
  {

    $this->like_options[] = 'INCLUDING GENERATED';

    return $this;

  }

  public function excludingGenerated(): static
  {

    $this->like_options[] = 'EXCLUDING GENERATED';

    return $this;

  }

  public function includingIdentity(): static
  {

    $this->like_options[] = 'INCLUDING IDENTITY';

    return $this;

  }

  public function excludingIdentity(): static
  {

    $this->like_options[] = 'EXCLUDING IDENTITY';

    return $this;

  }

  public function includingIndexes(): static
  {

    $this->like_options[] = 'INCLUDING INDEXES';

    return $this;

  }

  public function excludingIndexes(): static
  {

    $this->like_options[] = 'EXCLUDING INDEXES';

    return $this;

  }

  public function includingStatistics(): static
  {

    $this->like_options[] = 'INCLUDING STATISTICS';

    return $this;

  }

  public function excludingStatistics(): static
  {

    $this->like_options[] = 'EXCLUDING STATISTICS';

    return $this;

  }

  public function includingStorage(): static
  {

    $this->like_options[] = 'INCLUDING STORAGE';

    return $this;

  }

  public function excludingStorage(): static
  {

    $this->like_options[] = 'EXCLUDING STORAGE';

    return $this;

  }

  public function includingAll(): static
  {

    $this->like_options[] = 'INCLUDING ALL';

    return $this;

  }

  public function excludingAll(): static
  {

    $this->like_options[] = 'EXCLUDING ALL';

    return $this;

  }

  protected function getLikeOptions(): string
  {

    if (empty($this->like_options))
    {
      return '';
    }

    $like_options = implode(' ', $this->like_options);

    return " $like_options";

  }

  protected function getLike(): string
  {

    if ('' === $this->like)
    {
      return '';
    }

    $like_options = $this->getLikeOptions();

    return "LIKE $this->like$like_options";

  }

}