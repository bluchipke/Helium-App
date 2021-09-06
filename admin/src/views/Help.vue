<template>
  <div>
    <v-expansion-panels>
      <v-expansion-panel>
        <v-expansion-panel-header>
          <h3>Who are We?</h3>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          Our name is Smart Books, and we are your local digital library
          provided by Helium Prime. We bring the library services to your living
          room.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>
          <h3>What Category of books do you have?</h3>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          We have several categories of books:
          <ul>
            <li>Comics</li>
            <li>Novel</li>
            <li>Culture</li>
            <li>Life</li>
            <li>Knowledge/Educational</li>
            <li>Computer Science</li>
            <li>Religion</li>
            <li>Business</li>
            <li>Revision Materials</li>
          </ul>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header>
          <h3>
            How do I borrow a material from your library?
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          To borrow a book you must have an account with us. You will head over
          to the requests section.
          <ul>
            <li>Search and select your book of choice</li>
            <li>
              Indicate your date or return. (Most of our materials are borrowed
              for max 2 WEEKS)
            </li>
            <li>
              In case you have other notes, include them under
              <strong>Notes</strong>
            </li>
            <li>Save to Place a Request</li>
            <li>
              Indicate whether you will pick the book or you want it delivered
              (in this case you will cater for the delivery fees)
            </li>
            <li>Your request will be reviewed</li>
          </ul>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>
            What if I don't find the material I want?
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          Our database is still growing and you might miss a material. In that
          case, notify us and check whether we have it in store. We'll respond
          as soon as possible.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>What are the membership groups?</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          At the moment, we provide 3 membership models:

          <h3>ARTIST</h3>
          <p>
            No membership fees. You can borrow our books for
            <strong>KES 200</strong> and pick them up in person for a period of
            2 WEEKS.
          </p>
          <h3>ANCIENT</h3>
          <p>
            A paid membership of SMART BOOKS LIBRARY. Membership is currently
            open for
            <strong>KES 999 ANNUALLY</strong> You can borrow a book at
            <strong>KES 100</strong>.
          </p>
          <p>
            <strong
              >We are working on having more options for you soonest.</strong
            >
          </p>
          <!-- <h3>VIKING</h3>
          <p>A paid membership of SMART BOOKS LIBRARY. </p> -->
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>
            How many books can I borrow as a member?
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          Our membership plans allow you to borrow one book per session and a
          maximum of 5 per month.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>
            How do I renew or request another material
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <p>
            You can request another material through the request section. Your
            request will always be approved once the previous materials are all
            returned.
          </p>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>
            What is the fine for late or lost materials
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <p>
            Materials can only be late with a maximum of 7 days, otherwise they
            are considered lost.
          </p>
          <p>Late returns attract a fee of <strong>KES 50</strong> per day.</p>
          <p>
            Any premium member can only have 3 late returns per year, any lost
            or damaged book must be replaced.
          </p>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>When should I do the requests?</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          Place your requests on Sunday, Tuesday and Thursday. For self
          collection, you can pick the books the same day or the next once
          request is approved. For office or home deliveries, the materials are
          delivered the next day between 8a.m and 4p.m
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- template -->
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>How can I find e-books</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          Most of our books are hardcopy books. As a premium member, you can
          find e-books on selected books.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- template -->
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>
            How many items can I check out at a time?
          </h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          A member can checkout only 1 book per session. The number of books can
          increase with increased profile strenght and borrowing frequency!
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>Can you manage my library?</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <strong>Definitely!</strong> Submit your request to us through
          WhatsApp (+254 738 325 251 - for now) and we'll manage your entire
          library.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>Do we accept material donations?</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <strong>Yes.</strong> We have a vision to build a reading continent
          (Africa) and a physical SMART library for that matter. Above all, we
          wamt to ensure that everyone finds a resource to further their lives.
          To achieve this goal, we will need your support in every way. join us
          and let us push the African agenda together!
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- template -->
      <v-expansion-panel>
        <v-expansion-panel-header
          ><h3>Policy violation penalties.</h3></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          We are working on a strict trust level. Any member who violates our
          policies in one way or the other, risk a ban from using our platform
          and any of our services, in some cases, for a lifetime.
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- template -->
    </v-expansion-panels>
  </div>
</template>
