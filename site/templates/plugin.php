<?php layout('plugins') ?>

<style>
  .plugin-links .btn {
    justify-content: flex-start;
    margin-bottom: 2px;
    width: 100%;
    border-bottom: 1px solid var(--color-gray-300);
    overflow: hidden;
  }

  .plugin-intro {
    margin-bottom: var(--spacing-10);
  }

  .plugin-author {
    display: flex;
    align-items: center;
    padding: var(--spacing-6);
    margin-bottom: 2px;
    border-bottom: 1px solid var(--color-gray-300);
    font-family: var(--font-mono);
    font-size: var(--text-xs);
  }

  .plugin-author img {
    aspect-ratio: 1/1;
    border-radius: 100%;
    width: 3rem;
    margin-right: .75rem;
  }
</style>


<article>

  <header class="mb-42">

    <h1 class="h1 block mb-12"><?= $page->title() ?></h1>

    <div class="columns mb-12" style="--gap: var(--spacing-6)">
      <div style="--span: 9">
        <figure>
          <div class="bg-light rounded overflow-hidden shadow-xl mb-6" style="--aspect-ratio: 2/1">
            <?php if ($card = $page->card()) : ?>
              <img src="<?= $card->url() ?>">
            <?php elseif ($page->example()->isNotEmpty()) : ?>
              <div style="--aspect-ratio: 2/1; background: #000; overflow:hidden">
                <div class="flex items-center justify-center">
                  <div class="shadow-xl"><?= $page->example()->kt() ?></div>
                </div>
              </div>
            <?php else : ?>
              <div class="block" style="--aspect-ratio: 2/1">
                <span>
                  <span class="grid place-items-center" style="height: 100%">
                    <?= icon($page->icon()) ?>
                  </span>
                </span>
              </div>
            <?php endif ?>
          </div>
          <figcaption class="prose pt-3 text-xl color-black">
            <?= $page->description()->kt()->widont() ?>
          </figcaption>
        </figure>

      </div>
      <nav aria-label="Plugin links" class="plugin-links" style="--span: 3; --gap: .25rem">
        <div class="plugin-author">
          <img src="https://avatars.githubusercontent.com/u/14079751?v=4">
          <a href=" <?= $author->url() ?>"><?= $author->title() ?>
        </div>
        <div>
          <a class="btn " href="<?= $download ?>">
            <?= icon('download') ?> Download <?= $page->version() ?>
          </a>

          <?php if ($page->repository()->isNotEmpty()) : ?>
            <a class="btn " href="<?= $page->repository() ?>">
              <?= icon('github') ?> Source
            </a>
          <?php endif ?>
        </div>

      </nav>
    </div>

  </header>

  <?php if ($relatedPlugins->count()) : ?>
    <section class="mb-42">
      <h2 class="h2 mb-6">Related plugins</h2>
      <?php snippet('templates/plugins/cardlets', ['plugins' => $relatedPlugins, 'headingLevel' => 'h3']) ?>
    </section>
  <?php endif ?>

  <?php if ($authorPlugins->count()) : ?>
    <section class="mb-42">
      <h2 class="h2 mb-6">Other plugins by <a href="<?= $author->url() ?>" class="link"><?= $author->title() ?></a></h2>
      <?php snippet('templates/plugins/cardlets', ['plugins' => $authorPlugins, 'headingLevel' => 'h3']) ?>
    </section>
  <?php endif ?>

</article>
