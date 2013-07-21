import pygame
import data
from gui import MenuButton


class Game:
    def __init__(self, screen, unit):
        self.screen = screen
        self.unit = unit
        self.running = True
        self.clock = pygame.time.Clock()
        self.choice = 0
        self.size = self.screen.get_size()

        self.img_background = pygame.image.load(data.filepath("title","background.jpg"))
        self.img_background.set_alpha(50)
        self.img_background_rect = self.img_background.get_rect()
        self.img_background_rect.centerx = self.screen.get_rect().centerx
        self.img_background_rect.centery = self.screen.get_rect().centery

    def main(self):
        self.choice = 0
        start_game = False

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

        last_choice = -1
        subject = ""

        while not start_game:
            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_UP or event.key == pygame.K_w:
                        self.choice -= 1
                    elif event.key == pygame.K_DOWN or event.key == pygame.K_s:
                        self.choice += 1
                    elif event.key == pygame.K_RETURN or event.key == pygame.K_SPACE:
                        if self.choice == 0:
                            pass
                        elif self.choice == 1:
                            pass
                        elif self.choice == 2:
                            pass
                        elif self.choice == 3:
                            pass
                        else:
                            #self.running = False
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