<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait FrameSpec
{

  protected string $units = '';
  protected string $between = '';
  protected mixed $frame_start = null;
  protected mixed $frame_end = null;
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

  public function between(): static
  {

    $this->between = 'BETWEEN';

    return $this;

  }

  public function unbounded(): static
  {

    $this->frame_start = 'UNBOUNDED PRECEDING';

    return $this;

  }

  public function preceding(mixed $preceding): static
  {

    $this->frame_start = [$preceding, 'PRECEDING'];

    return $this;

  }

  public function currentRow(): static
  {

    $this->frame_start = 'CURRENT ROW';

    return $this;

  }

  public function following(mixed $following): static
  {

    $this->frame_start = [$following, 'FOLLOWING'];

    return $this;

  }

  public function betweenUnbounded(): static
  {

    $this->between();

    return $this->unbounded();

  }

  public function betweenPreceding(mixed $preceding): static
  {

    $this->between();

    return $this->preceding(preceding: $preceding);

  }

  public function betweenCurrentRow(): static
  {

    $this->between();

    return $this->currentRow();

  }

  public function betweenFollowing(mixed $following): static
  {

    $this->between();

    return $this->following(following: $following);

  }

  public function andPreceding(mixed $preceding): static
  {

    $this->frame_end = [$preceding, 'PRECEDING'];

    return $this->between();

  }

  public function andCurrentRow(): static
  {

    $this->frame_end = 'CURRENT ROW';

    return $this->between();

  }

  public function andFollowing(mixed $following): static
  {

    $this->frame_end = [$following, 'FOLLOWING'];

    return $this->between();

  }

  public function andUnbounded(): static
  {

    $this->frame_end = 'UNBOUNDED FOLLOWING';

    return $this->between();

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

    if (null === $this->frame_start)
    {
      return '';
    }

    $frame_start = implode(' ', (array) $this->frame_start);

    foreach ((array) $this->frame_start as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings(from: $part);
      }

    }

    return $frame_start;

  }

  protected function getFrameEnd(): string
  {

    if (null === $this->frame_end)
    {
      return '';
    }

    $frame_end = implode(' ', (array) $this->frame_end);

    foreach ((array) $this->frame_end as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings(from: $part);
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
      $this->exclude
    ]));

  }

}