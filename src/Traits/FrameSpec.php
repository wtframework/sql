<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait FrameSpec
{

  protected string $units = '';
  protected string $between = '';
  protected array $frame_start = [];
  protected array $frame_end = [];
  protected string $exclude = '';

  public function range(): static
  {

    $this->units = 'RANGE';

    return $this;

  }

  public function rows(): static
  {

    $this->units = 'ROWS';

    return $this;

  }

  public function groups(): static
  {

    $this->units = 'GROUPS';

    return $this;

  }

  protected function between(): static
  {

    $this->between = 'BETWEEN';

    return $this;

  }

  public function betweenUnbounded(): static
  {

    $this->unbounded();

    return $this->between();

  }

  public function betweenPreceding(string|int|HasBindings $expression): static
  {

    $this->preceding($expression);

    return $this->between();

  }

  public function betweenCurrentRow(): static
  {

    $this->currentRow();

    return $this->between();

  }

  public function betweenFollowing(string|int|HasBindings $expression): static
  {

    $this->frame_start = [$expression, 'FOLLOWING'];

    return $this->between();

  }

  public function andPreceding(string|int|HasBindings $expression): static
  {

    $this->frame_end = [$expression, 'PRECEDING'];

    return $this->between();

  }

  public function andCurrentRow(): static
  {

    $this->frame_end = ['CURRENT ROW'];

    return $this->between();

  }

  public function andFollowing(string|int|HasBindings $expression): static
  {

    $this->frame_end = [$expression, 'FOLLOWING'];

    return $this->between();

  }

  public function andUnbounded(): static
  {

    $this->frame_end = ['UNBOUNDED FOLLOWING'];

    return $this->between();

  }

  public function unbounded(): static
  {

    $this->frame_start = ['UNBOUNDED PRECEDING'];

    return $this;

  }

  public function preceding(string|int|HasBindings $expression): static
  {

    $this->frame_start = [$expression, 'PRECEDING'];

    return $this;

  }

  public function currentRow(): static
  {

    $this->frame_start = ['CURRENT ROW'];

    return $this;

  }

  public function excludeNoOthers(): static
  {

    $this->exclude = 'EXCLUDE NO OTHERS';

    return $this;

  }

  public function excludeCurrentRow(): static
  {

    $this->exclude = 'EXCLUDE CURRENT ROW';

    return $this;

  }

  public function excludeGroup(): static
  {

    $this->exclude = 'EXCLUDE GROUP';

    return $this;

  }

  public function excludeTies(): static
  {

    $this->exclude = 'EXCLUDE TIES';

    return $this;

  }

  protected function getFrameStart(): string
  {

    if (empty($this->frame_start))
    {
      return '';
    }

    $frame_start = implode(' ', $this->frame_start);

    foreach ($this->frame_start as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings($part);
      }

    }

    return $frame_start;

  }

  protected function getFrameEnd(): string
  {

    if (empty($this->frame_end))
    {
      return '';
    }

    $frame_end = implode(' ', $this->frame_end);

    foreach ($this->frame_end as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings($part);
      }

    }

    return "AND $frame_end";

  }

  protected function getFrameSpec(): string
  {

    return implode(' ', array_filter([
      $this->units,
      $this->between,
      $this->getFrameStart(),
      $this->getFrameEnd(),
      $this->exclude,
    ]));

  }

}