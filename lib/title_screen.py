import pygame
import data
from gui import MenuButton
import subject

class TitleScreen:
    def __init__(self, screen, unit):
        self.screen = screen
        self.unit = unit
        self.running = True
        self.clock = pygame.time.Clock()
        self.choice = 0
        self.chosen_subject = False

        self.img_background = pygame.image.load(data.filepath("title", "background.jpg"))
        self.img_background_rect = self.img_background.get_rect()

    def draw_background(self):
        self.screen.fill((0, 0, 0))
        self.screen.blit(self.img_background,self.img_background_rect)

    def main(self):
        self.choice = 0
        start_game = False

        button_play = MenuButton("PLAY",self.unit,(self.unit*17, self.unit*3))
        button_play.rect.centerx = self.screen.get_rect().centerx
        button_play.rect.y = self.unit*29
        button_play.set_status(1)

        button_help = MenuButton("HELP",self.unit,(self.unit*17, self.unit*3))
        button_help.rect.centerx = self.screen.get_rect().centerx
        button_help.rect.y = self.unit*33

        button_exit = MenuButton("QUIT",self.unit,(self.unit*17, self.unit*3))
        button_exit.rect.centerx = self.screen.get_rect().centerx
        button_exit.rect.y = self.unit*37

        buttons = pygame.sprite.Group()
        buttons.add([button_play,button_help,button_exit])
        assert len(buttons) == 3, 'There should be three Main Menu or Title Screen buttons'

        self.draw_background()

        last_choice = -1

        while not start_game:
            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_UP or event.key == pygame.K_w:
                        self.choice -= 1
                    elif event.key == pygame.K_DOWN or event.key == pygame.K_s:
                        self.choice += 1
                    elif event.key == pygame.K_RETURN or event.key == pygame.K_SPACE:
                        if self.choice == 0:
                            self.choose_subject()
                            self.draw_background()
                            if self.chosen_subject:
                                return
                        elif self.choice == 1:
                            pass
                        else:
                            self.running = False
                            return
                    elif event.key == pygame.K_ESCAPE:
                        self.running = False
                        return
                    elif event.key == pygame.K_1:
                        pygame.image.save(self.screen, "screenshot.jpg")
                elif event.type == pygame.QUIT:
                    self.running = False
                    return
            if self.choice != last_choice:
                if self.choice < 0: self.choice = 2
                elif self.choice > 2: self.choice = 0

                button_play.set_status(0)
                button_help.set_status(0)
                button_exit.set_status(0)

                if self.choice == 0: button_play.set_status(1)
                elif self.choice == 1: button_help.set_status(1)
                elif self.choice == 2: button_exit.set_status(1)
                last_choice = self.choice

            buttons.update()
            buttons.draw(self.screen)
            pygame.display.flip()
            self.clock.tick(30)

    def choose_subject(self):
        game = False

        button_astronomy = MenuButton("ASTRONOMY",self.unit,(self.unit*17, self.unit*3))
        button_astronomy.rect.centerx = self.screen.get_rect().centerx
        button_astronomy.rect.y = self.unit*29
        button_astronomy.set_status(1)

        button_mathematics = MenuButton("MATHEMATICS",self.unit,(self.unit*17, self.unit*3))
        button_mathematics.rect.centerx = self.screen.get_rect().centerx
        button_mathematics.rect.y = self.unit*33

        button_generalScience = MenuButton("GENERAL SCIENCE",self.unit,(self.unit*17, self.unit*3))
        button_generalScience.rect.centerx = self.screen.get_rect().centerx
        button_generalScience.rect.y = self.unit*37

        button_history = MenuButton("HISTORY",self.unit,(self.unit*17, self.unit*3))
        button_history.rect.centerx = self.screen.get_rect().centerx
        button_history.rect.y = self.unit*41

        button_backToMainMenu = MenuButton("BACK TO MAIN MENU",self.unit,(self.unit*17, self.unit*3))
        button_backToMainMenu.rect.centerx = self.screen.get_rect().centerx
        button_backToMainMenu.rect.y = self.unit*45

        buttons = pygame.sprite.Group()
        buttons.add([button_astronomy,button_mathematics,button_generalScience,button_history,button_backToMainMenu])
        assert len(buttons) == 5, 'There should be five subject buttons to choose from.'

        self.draw_background()

        last_choice = -1

        while not game:
            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_UP or event.key == pygame.K_w:
                        self.choice -= 1
                    elif event.key == pygame.K_DOWN or event.key == pygame.K_s:
                        self.choice += 1
                    elif event.key == pygame.K_RETURN or event.key == pygame.K_SPACE:
                        if self.choice == 0:
                            subject.set("astronomy.txt")
                            self.chosen_subject = True
                            game = True
                        elif self.choice == 1:
                            subject.set("mathematics.txt")
                            self.chosen_subject = True
                            game = True
                        elif self.choice == 2:
                            subject.set("generalscience.txt")
                            self.chosen_subject = True
                            game = True
                        elif self.choice == 3:
                            subject.set("history.txt")
                            self.chosen_subject = True
                            game = True
                        else:
                            return
                    elif event.key == pygame.K_ESCAPE:
                        return
                    elif event.key == pygame.K_1:
                        pygame.image.save(self.screen, "screenshot.jpg")
                elif event.type == pygame.QUIT:
                    return
            if self.choice != last_choice:
                if self.choice < 0:
                    self.choice = 4
                elif self.choice > 4:
                    self.choice = 0

                button_astronomy.set_status(0)
                button_mathematics.set_status(0)
                button_generalScience.set_status(0)
                button_history.set_status(0)
                button_backToMainMenu.set_status(0)

                if self.choice == 0:
                    button_astronomy.set_status(1)
                elif self.choice == 1:
                    button_mathematics.set_status(1)
                elif self.choice == 2:
                    button_generalScience.set_status(1)
                elif self.choice == 3:
                    button_history.set_status(1)
                elif self.choice == 4:
                    button_backToMainMenu.set_status(1)
                last_choice = self.choice

            buttons.update()
            buttons.draw(self.screen)
            pygame.display.flip()
            self.clock.tick(30)
