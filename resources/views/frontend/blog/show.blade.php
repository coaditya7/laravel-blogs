@extends('frontend.layout')
@section('content')
<div
class="site-cover site-cover-sm same-height overlay single-page"
style="background-image: url('images/hero_5.jpg')"
>
<div class="container">
  <div class="row same-height justify-content-center">
    <div class="col-md-6">
      <div class="post-entry text-center">
        <h1 class="mb-4">
            {{$post->title}}
        </h1>
      </div>
    </div>
  </div>
</div>
</div>

<section class="section">
<div class="container">
  <div class="row blog-entries element-animate">
    <div class="col-md-12 col-lg-8 main-content">
      <div class="post-content-body">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Praesentium nam quas inventore, ut iure iste modi eos adipisci
          ad ea itaque labore earum autem nobis et numquam, minima eius.
          Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.
        </p>
        <p>
          Sint ab voluptates itaque, ipsum porro qui obcaecati cumque quas
          sit vel. Voluptatum provident id quis quo. Eveniet maiores
          perferendis officia veniam est laborum, expedita fuga doloribus
          natus repellendus dolorem ab similique sint eius cupiditate
          necessitatibus, magni nesciunt ex eos.
        </p>
        <p>
          Quis eius aspernatur, eaque culpa cumque reiciendis, nobis at
          earum assumenda similique ut? Aperiam vel aut, ex exercitationem
          eos consequuntur eaque culpa totam, deserunt, aspernatur quae
          eveniet hic provident ullam tempora error repudiandae sapiente
          illum rerum itaque voluptatem. Commodi, sequi.
        </p>
        <div class="row my-4">
          <div class="col-md-12 mb-4">
            <img
              src="{{ Storage::url($post->banner) }}"
              alt="Image placeholder"
              class="img-fluid rounded"
            />
          </div>
          <div class="col-md-6 mb-4">
            <img
              src="{{ Storage::url($post->banner) }}"
              alt="Image placeholder"
              class="img-fluid rounded"
            />
          </div>
          <div class="col-md-6 mb-4">
            <img
              src="{{ Storage::url($post->banner) }}"
              alt="Image placeholder"
              class="img-fluid rounded"
            />
          </div>
        </div>
        <p>
          Quibusdam autem, quas molestias recusandae aperiam molestiae
          modi qui ipsam vel. Placeat tenetur veritatis tempore quos
          impedit dicta, error autem, quae sint inventore ipsa quidem. Quo
          voluptate quisquam reiciendis, minus, animi minima eum officia
          doloremque repellat eos, odio doloribus cum.
        </p>
        <p>
          Temporibus quo dolore veritatis doloribus delectus dolores
          perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat,
          magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat
          impedit necessitatibus nisi cupiditate, quas repellat itaque
          molestias sit libero voluptas eveniet omnis illo ullam dolorem
          minima.
        </p>
        <p>
          Porro amet accusantium libero fugit totam, deserunt ipsa,
          dolorem, vero expedita illo similique saepe nisi deleniti.
          Cumque, laboriosam, porro! Facilis voluptatem sequi nulla
          quidem, provident eius quos pariatur maxime sapiente illo
          nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.
        </p>
        <p>
          Illo magnam at dolore ad enim fugiat ut maxime facilis autem,
          nulla cumque quis commodi eos nisi unde soluta, ipsa eius
          aspernatur sint atque! Nihil, eveniet illo ea, mollitia fuga
          accusamus dolor dolorem perspiciatis rerum hic, consectetur
          error rem aspernatur!
        </p>

        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Temporibus magni explicabo id molestiae, minima quas assumenda
          consectetur, nobis neque rem, incidunt quam tempore perferendis
          provident obcaecati sapiente, animi vel expedita omnis quae
          ipsa! Obcaecati eligendi sed odio labore vero reiciendis facere
          accusamus molestias eaque impedit, consequuntur quae fuga vitae
          fugit?
        </p>
      </div>
    </div>

    <!-- END main-content -->

    <div class="col-md-12 col-lg-4 sidebar">
      <div class="sidebar-box search-form-wrap">
        <form action="#" class="sidebar-search-form">
          <span class="bi-search"></span>
          <input
            type="text"
            class="form-control"
            id="s"
            placeholder="Type a keyword and hit enter"
          />
        </form>
      </div>

      <div class="sidebar-box">
        <h3 class="heading">Latest Posts</h3>
        <div class="post-entry-sidebar">
            @foreach ($latest_posts as $latest_post)
            <ul>
              <li>
                <a href="">
                  <img
                    src="{{ Storage::url($latest_post->banner) }}"
                    alt="Image placeholder"
                    class="me-4 rounded"
                  />
                  <div class="text">
                    <h4>
                      {{ $latest_post->title }}
                    </h4>
                  </div>
                </a>
              </li>
            </ul>
            @endforeach
        </div>
      </div>
      <!-- END sidebar-box -->

      <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach ($categories as $category)        
            <li>
              <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }} <span>{{ $category->post->count() }}</span></a>
            </li>
            @endforeach
        </ul>
      </div>
      <!-- END sidebar-box -->
    </div>
    <!-- END sidebar -->
  </div>
</div>
</section>
@endsection


